<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260923010000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds a short summary field to testimonials.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform), 'Migration can only be executed safely on mysql.');

        $this->addSql("ALTER TABLE testimonials ADD shortText LONGTEXT NOT NULL AFTER title");
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform), 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE testimonials DROP shortText');
    }
}
