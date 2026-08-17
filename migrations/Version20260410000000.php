<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\AbstractMySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260410000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates the initial schema from the current Doctrine entities.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.',
        );

        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, url VARCHAR(100) NOT NULL, content LONGTEXT NOT NULL, shortText LONGTEXT NOT NULL, image VARCHAR(100) NOT NULL, datePosted DATETIME NOT NULL, featured TINYINT(1) NOT NULL, metaTitle VARCHAR(100) NOT NULL, metaDescription VARCHAR(100) NOT NULL, metaKeywords VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, phone VARCHAR(20) NOT NULL, message LONGTEXT NOT NULL, interestedIn VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_list_signups (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, userInfo VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, headline VARCHAR(250) NOT NULL, subHeading VARCHAR(250) NOT NULL, impressions INT NOT NULL, buttonText VARCHAR(150) NOT NULL, buttonUrl VARCHAR(150) NOT NULL, secondaryButtonText VARCHAR(150) NOT NULL, secondaryButtonUrl VARCHAR(150) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log_button_clicks (id INT AUTO_INCREMENT NOT NULL, target VARCHAR(50) NOT NULL, url VARCHAR(100) NOT NULL, detail LONGTEXT NOT NULL, userIP VARCHAR(50) NOT NULL, userInfo LONGTEXT NOT NULL, serverInfo LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, pageContentId INT NOT NULL, parentId INT NOT NULL, listingOrder INT NOT NULL, title VARCHAR(50) NOT NULL, url VARCHAR(60) NOT NULL, class VARCHAR(60) NOT NULL, menuLocation VARCHAR(20) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_content (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, content LONGTEXT NOT NULL, metaTitle VARCHAR(100) NOT NULL, metaDescription VARCHAR(500) NOT NULL, metaKeywords VARCHAR(500) NOT NULL, dateUpdated VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portfolio (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, url VARCHAR(150) NOT NULL, content VARCHAR(500) NOT NULL, image VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, listingOrder INT NOT NULL, title VARCHAR(50) NOT NULL, url VARCHAR(50) NOT NULL, iconType VARCHAR(50) NOT NULL, iconBootstrap VARCHAR(50) NOT NULL, iconFontAwesome VARCHAR(50) NOT NULL, largeIcon VARCHAR(50) NOT NULL, shortText LONGTEXT NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(50) NOT NULL, headerImage VARCHAR(50) NOT NULL, whyChooseList VARCHAR(50) NOT NULL, footerCallout VARCHAR(50) NOT NULL, dateAdded DATETIME NOT NULL, dateUpdated DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(
            !($this->connection->getDatabasePlatform() instanceof AbstractMySQLPlatform),
            'Migration can only be executed safely on mysql.',
        );

        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE portfolio');
        $this->addSql('DROP TABLE page_content');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE log_button_clicks');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE email_list_signups');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE blog');
    }
}
