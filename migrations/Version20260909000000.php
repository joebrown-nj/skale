<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260909000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Moves legacy service and solution content into menu-backed page_content records and removes the duplicate tables.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.',
        );

        // Temporarily retain source identifiers so orphaned legacy rows can be
        // linked to newly-created menu records without making URL part of content.
        $this->addSql('ALTER TABLE page_content ADD legacySource VARCHAR(20) DEFAULT NULL, ADD legacyId INT DEFAULT NULL');

        $hasSolutions = $schema->hasTable('solutions');
        $hasServices = $schema->hasTable('services');

        if ($hasServices) {
            $this->copyLegacyPages('services');
        }

        // Solutions win when both legacy tables contain the same URL.
        if ($hasSolutions) {
            $this->copyLegacyPages('solutions');
        }

        // Some solution-category menu records never had a corresponding row in
        // either legacy content table. They still need page_content records now
        // that all solution navigation is resolved through this relationship.
        $this->addSql(
            "INSERT INTO page_content (title, content, metaTitle, metaDescription, metaKeywords, dateUpdated, legacySource, legacyId)
             SELECT m.title, '', m.title, '', '', NOW(), 'menu', m.id
             FROM menu m
             LEFT JOIN page_content p ON p.id = m.pageContentId
             WHERE m.url LIKE 'solutions/%' AND p.id IS NULL",
        );
        $this->addSql(
            "UPDATE menu m
             INNER JOIN page_content p ON p.legacySource = 'menu' AND p.legacyId = m.id
             SET m.pageContentId = p.id
             WHERE m.url LIKE 'solutions/%'",
        );

        $this->addSql('ALTER TABLE page_content DROP legacySource, DROP legacyId');

        if ($hasServices) {
            $this->addSql('DROP TABLE services');
        }

        if ($hasSolutions) {
            $this->addSql('DROP TABLE solutions');
        }
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.',
        );

        $legacyTableSql = '(id INT AUTO_INCREMENT NOT NULL, listingOrder INT NOT NULL, title VARCHAR(50) NOT NULL, url VARCHAR(50) NOT NULL, iconType VARCHAR(50) NOT NULL, iconBootstrap VARCHAR(50) NOT NULL, iconFontAwesome VARCHAR(50) NOT NULL, largeIcon VARCHAR(50) NOT NULL, shortText LONGTEXT NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(50) NOT NULL, headerImage VARCHAR(50) NOT NULL, whyChooseList VARCHAR(50) NOT NULL, footerCallout VARCHAR(50) NOT NULL, dateAdded DATETIME NOT NULL, dateUpdated DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB';
        $this->addSql('CREATE TABLE services ' . $legacyTableSql);
        $this->addSql('CREATE TABLE solutions ' . $legacyTableSql);
        $this->addSql(
            "INSERT INTO solutions (listingOrder, title, url, iconType, iconBootstrap, iconFontAwesome, largeIcon, shortText, content, image, headerImage, whyChooseList, footerCallout, dateAdded, dateUpdated, active)
             SELECT m.listingOrder, p.title, m.url, '', m.icon, '', '', '', p.content, '', '', '', '', NOW(), NOW(), m.active
             FROM menu m
             INNER JOIN page_content p ON p.id = m.pageContentId
             WHERE m.url LIKE 'solutions/%'",
        );
    }

    private function copyLegacyPages(string $table): void
    {
        $this->addSql(
            sprintf(
                'UPDATE page_content p
                 INNER JOIN menu m ON m.pageContentId = p.id
                 INNER JOIN %1$s legacy ON legacy.url = m.url
                 SET p.title = legacy.title, p.content = legacy.content,
                     p.dateUpdated = CAST(legacy.dateUpdated AS CHAR)',
                $table,
            ),
        );
        $this->addSql(
            sprintf(
                "INSERT INTO page_content (title, content, metaTitle, metaDescription, metaKeywords, dateUpdated, legacySource, legacyId)
                 SELECT legacy.title, legacy.content, legacy.title, '', '', CAST(legacy.dateUpdated AS CHAR), '%1\$s', legacy.id
                 FROM %1\$s legacy
                 LEFT JOIN menu m ON m.url = legacy.url
                 WHERE m.id IS NULL",
                $table,
            ),
        );
        $this->addSql(
            sprintf(
                "INSERT INTO menu (pageContentId, parentId, listingOrder, title, url, class, icon, menuLocation, active)
                 SELECT p.id, 0, legacy.listingOrder, legacy.title, legacy.url, '',
                        CASE WHEN legacy.iconBootstrap <> '' THEN legacy.iconBootstrap ELSE legacy.iconFontAwesome END,
                        'hidden', legacy.active
                 FROM page_content p
                 INNER JOIN %1\$s legacy ON p.legacySource = '%1\$s' AND p.legacyId = legacy.id",
                $table,
            ),
        );
    }
}
