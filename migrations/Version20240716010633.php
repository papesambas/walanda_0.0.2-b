<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716010633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cercles ADD region_id INT NOT NULL');
        $this->addSql('ALTER TABLE cercles ADD CONSTRAINT FK_45C1718D98260155 FOREIGN KEY (region_id) REFERENCES regions (id)');
        $this->addSql('CREATE INDEX IDX_45C1718D98260155 ON cercles (region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cercles DROP FOREIGN KEY FK_45C1718D98260155');
        $this->addSql('DROP INDEX IDX_45C1718D98260155 ON cercles');
        $this->addSql('ALTER TABLE cercles DROP region_id');
    }
}
