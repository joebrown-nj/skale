<?php

declare(strict_types=1);

$projectRoot = dirname(__DIR__);
$files = [
    $projectRoot . '/vendor/phroute/phroute/src/Phroute/RouteCollector.php' => [
        'public function __construct(RouteParser $routeParser = null) {' => 'public function __construct(?RouteParser $routeParser = null) {',
        'public function route($name, array $args = null)' => 'public function route($name, ?array $args = null)',
    ],
    $projectRoot . '/vendor/phroute/phroute/src/Phroute/Dispatcher.php' => [
        'public function __construct(RouteDataInterface $data, HandlerResolverInterface $resolver = null)' => 'public function __construct(RouteDataInterface $data, ?HandlerResolverInterface $resolver = null)',
    ],
];

foreach ($files as $path => $replacements) {
    if (!is_file($path)) {
        continue;
    }

    $contents = file_get_contents($path);

    if ($contents === false) {
        fwrite(STDERR, 'Unable to read ' . $path . PHP_EOL);
        exit(1);
    }

    $updated = str_replace(
        array_keys($replacements),
        array_values($replacements),
        $contents,
        $count,
    );

    if ($count === 0) {
        continue;
    }

    if (file_put_contents($path, $updated) === false) {
        fwrite(STDERR, 'Unable to write ' . $path . PHP_EOL);
        exit(1);
    }
}

echo 'Phroute PHP 8.4 patch applied.' . PHP_EOL;
