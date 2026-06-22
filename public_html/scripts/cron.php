<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Core\Environment;

require_once dirname(__DIR__, 2).'/vendor/autoload.php';

$projectRoot = dirname(__DIR__, 2);

Environment::boot($projectRoot);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME']
);
$connection->set_charset('utf8mb4');

try {
    $buttonClicksTable = resolveTableName($connection, ['log_button_clicks']);
    $contactsTable = resolveTableName($connection, ['contacts', 'contact']);

    $buttonClicksTimestampColumn = resolveTimestampColumn($connection, $buttonClicksTable);
    $contactsTimestampColumn = resolveTimestampColumn($connection, $contactsTable);

    $buttonClicksRows = fetchLast24Hours($connection, $buttonClicksTable, $buttonClicksTimestampColumn);
    $contactRows = fetchLast24Hours($connection, $contactsTable, $contactsTimestampColumn);

    echo buildReport(
        $buttonClicksTable,
        $buttonClicksTimestampColumn,
        $buttonClicksRows,
        $contactsTable,
        $contactsTimestampColumn,
        $contactRows
    );
} catch (Throwable $exception) {
    fwrite(STDERR, '[cron-report] '.$exception->getMessage().PHP_EOL);
    exit(1);
} finally {
    $connection->close();
}

function buildReport(
    string $buttonClicksTable,
    string $buttonClicksTimestampColumn,
    array $buttonClicksRows,
    string $contactsTable,
    string $contactsTimestampColumn,
    array $contactRows
): string {
    $generatedAt = new DateTimeImmutable('now');
    $windowStart = $generatedAt->sub(new DateInterval('P1D'));

    $output = [];
    $output[] = 'Daily activity report';
    $output[] = 'Generated: '.$generatedAt->format('Y-m-d H:i:s');
    $output[] = 'Window: '.$windowStart->format('Y-m-d H:i:s').' to '.$generatedAt->format('Y-m-d H:i:s');
    $output[] = '';
    $output[] = formatSection(
        $buttonClicksTable,
        $buttonClicksTimestampColumn,
        $buttonClicksRows
    );
    $output[] = '';
    $output[] = formatSection(
        $contactsTable,
        $contactsTimestampColumn,
        $contactRows
    );

    return implode(PHP_EOL, $output).PHP_EOL;
}

function formatSection(string $table, string $timestampColumn, array $rows): string
{
    $output = [];
    $output[] = strtoupper($table);
    $output[] = 'Timestamp column: '.$timestampColumn;
    $output[] = 'Records found: '.count($rows);

    if ($rows === []) {
        $output[] = 'No records found in the last 24 hours.';
        return implode(PHP_EOL, $output);
    }

    foreach ($rows as $index => $row) {
        $output[] = '';
        $output[] = sprintf('Record %d', $index + 1);

        foreach ($row as $field => $value) {
            $output[] = sprintf(
                '  %s: %s',
                $field,
                normalizeValue($value)
            );
        }
    }

    return implode(PHP_EOL, $output);
}

function normalizeValue(mixed $value): string
{
    if ($value === null) {
        return 'NULL';
    }

    if (is_scalar($value)) {
        $stringValue = trim((string) $value);
        return $stringValue === '' ? '[empty]' : preg_replace('/\s+/', ' ', $stringValue);
    }

    $encoded = json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    return $encoded === false ? '[unprintable]' : $encoded;
}

function fetchLast24Hours(mysqli $connection, string $table, string $timestampColumn): array
{
    $sql = sprintf(
        'SELECT * FROM `%s` WHERE `%s` >= DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY `%s` DESC, `id` DESC',
        $connection->real_escape_string($table),
        $connection->real_escape_string($timestampColumn),
        $connection->real_escape_string($timestampColumn)
    );

    $result = $connection->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}

function resolveTableName(mysqli $connection, array $candidates): string
{
    foreach ($candidates as $candidate) {
        $result = $connection->query(
            "SHOW TABLES LIKE '".$connection->real_escape_string($candidate)."'"
        );

        if ($result->num_rows > 0) {
            return $candidate;
        }
    }

    throw new RuntimeException(
        'None of the expected tables were found: '.implode(', ', $candidates)
    );
}

function resolveTimestampColumn(mysqli $connection, string $table): string
{
    $candidateColumns = [
        'created_at',
        'created_on',
        'created',
        'timestamp',
        'date_created',
        'dateCreated',
        'dateAdded',
        'date_added',
        'submitted_at',
        'submitted_on',
        'logged_at',
        'clicked_at',
        'date',
    ];

    $columns = [];
    $result = $connection->query('SHOW COLUMNS FROM `'.$connection->real_escape_string($table).'`');

    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }

    foreach ($candidateColumns as $candidateColumn) {
        if (in_array($candidateColumn, $columns, true)) {
            return $candidateColumn;
        }
    }

    throw new RuntimeException(
        sprintf(
            'Table "%s" does not have a supported timestamp column. Available columns: %s',
            $table,
            implode(', ', $columns)
        )
    );
}
