<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716042522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE communes ADD cercle_id INT NOT NULL');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A527413AB9 FOREIGN KEY (cercle_id) REFERENCES cercles (id)');
        $this->addSql('CREATE INDEX IDX_5C5EE2A527413AB9 ON communes (cercle_id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD commune_id INT NOT NULL');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927F131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('CREATE INDEX IDX_49F8927F131A4F72 ON lieu_naissances (commune_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927F131A4F72');
        $this->addSql('DROP INDEX IDX_49F8927F131A4F72 ON lieu_naissances');
        $this->addSql('ALTER TABLE lieu_naissances DROP commune_id');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A527413AB9');
        $this->addSql('DROP INDEX IDX_5C5EE2A527413AB9 ON communes');
        $this->addSql('ALTER TABLE communes DROP cercle_id');
    }
}
