<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260923000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates testimonials and their many-to-many project and testimonial relationships.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform), 'Migration can only be executed safely on mysql.');

        // Legacy installations may still have this table on MyISAM, which
        // cannot be the target of a foreign key.
        $this->addSql('ALTER TABLE portfolio ENGINE = InnoDB');

        // MySQL implicitly commits DDL, so a failed run can leave these new
        // tables behind. IF NOT EXISTS makes the migration safe to retry.
        $this->addSql('CREATE TABLE IF NOT EXISTS testimonials (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, testimonialDate DATE NOT NULL, author VARCHAR(150) NOT NULL, authorTitle VARCHAR(150) DEFAULT NULL, company VARCHAR(150) DEFAULT NULL, imageUrl VARCHAR(500) DEFAULT NULL, rating SMALLINT DEFAULT NULL, active TINYINT(1) DEFAULT 1 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS testimonial_projects (testimonialId INT NOT NULL, projectId INT NOT NULL, INDEX IDX_TESTIMONIAL_PROJECT (testimonialId), INDEX IDX_PROJECT_TESTIMONIAL (projectId), PRIMARY KEY(testimonialId, projectId)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS testimonial_relationships (testimonialId INT NOT NULL, relatedTestimonialId INT NOT NULL, INDEX IDX_TESTIMONIAL_RELATED (testimonialId), INDEX IDX_RELATED_TESTIMONIAL (relatedTestimonialId), PRIMARY KEY(testimonialId, relatedTestimonialId)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE testimonial_projects ADD CONSTRAINT FK_TESTIMONIAL_PROJECT FOREIGN KEY (testimonialId) REFERENCES testimonials (id) ON DELETE CASCADE, ADD CONSTRAINT FK_PROJECT_TESTIMONIAL FOREIGN KEY (projectId) REFERENCES portfolio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE testimonial_relationships ADD CONSTRAINT FK_TESTIMONIAL_RELATED_SOURCE FOREIGN KEY (testimonialId) REFERENCES testimonials (id) ON DELETE CASCADE, ADD CONSTRAINT FK_TESTIMONIAL_RELATED_TARGET FOREIGN KEY (relatedTestimonialId) REFERENCES testimonials (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform), 'Migration can only be executed safely on mysql.');

        $this->addSql('DROP TABLE testimonial_relationships');
        $this->addSql('DROP TABLE testimonial_projects');
        $this->addSql('DROP TABLE testimonials');
    }
}
