<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715173155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departements (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, designation VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_CF7489B2B03A8386 (created_by_id), INDEX IDX_CF7489B2896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuts (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, designation VARCHAR(75) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_403505E6B03A8386 (created_by_id), INDEX IDX_403505E6896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephones (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, numero VARCHAR(23) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_6FCD09FB03A8386 (created_by_id), INDEX IDX_6FCD09F896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE departements ADD CONSTRAINT FK_CF7489B2B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE departements ADD CONSTRAINT FK_CF7489B2896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09FB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departements DROP FOREIGN KEY FK_CF7489B2B03A8386');
        $this->addSql('ALTER TABLE departements DROP FOREIGN KEY FK_CF7489B2896DBBDE');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B03A8386');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6896DBBDE');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09FB03A8386');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09F896DBBDE');
        $this->addSql('DROP TABLE departements');
        $this->addSql('DROP TABLE statuts');
        $this->addSql('DROP TABLE telephones');
    }
}
