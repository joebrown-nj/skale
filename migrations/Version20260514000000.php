<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260514000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Renames text columns to content across content-bearing tables.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.',
        );

        $this->addSql('ALTER TABLE blog CHANGE text content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE portfolio CHANGE text content VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE services CHANGE text content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE solutions CHANGE text content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE home_cards CHANGE text content LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.',
        );

        $this->addSql('ALTER TABLE home_cards CHANGE content text LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE solutions CHANGE content text LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE services CHANGE content text LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE portfolio CHANGE content text VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE blog CHANGE content text LONGTEXT NOT NULL');
    }
}
