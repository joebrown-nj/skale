<?php
declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260616000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates persistent request blacklist rules for blocking abusive traffic and spam submissions.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.'
        );

        $this->addSql(
            'CREATE TABLE request_block_rules (
                id INT AUTO_INCREMENT NOT NULL,
                attribute VARCHAR(50) NOT NULL,
                matchType VARCHAR(20) NOT NULL,
                ruleValue VARCHAR(500) NOT NULL,
                active TINYINT(1) NOT NULL DEFAULT 1,
                blockMessage VARCHAR(255) DEFAULT NULL,
                notes LONGTEXT DEFAULT NULL,
                createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
                expiresAt DATETIME DEFAULT NULL,
                INDEX IDX_REQUEST_BLOCK_RULES_ACTIVE_ATTRIBUTE (active, attribute),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.'
        );

        $this->addSql('DROP TABLE request_block_rules');
    }
}
