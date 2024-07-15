<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715164524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(60) NOT NULL, prenom VARCHAR(75) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, is_actif TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cercles ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE cercles ADD CONSTRAINT FK_45C1718DB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE cercles ADD CONSTRAINT FK_45C1718D896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_45C1718DB03A8386 ON cercles (created_by_id)');
        $this->addSql('CREATE INDEX IDX_45C1718D896DBBDE ON cercles (updated_by_id)');
        $this->addSql('ALTER TABLE communes ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A5B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A5896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_5C5EE2A5B03A8386 ON communes (created_by_id)');
        $this->addSql('CREATE INDEX IDX_5C5EE2A5896DBBDE ON communes (updated_by_id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927FB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927F896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_49F8927FB03A8386 ON lieu_naissances (created_by_id)');
        $this->addSql('CREATE INDEX IDX_49F8927F896DBBDE ON lieu_naissances (updated_by_id)');
        $this->addSql('ALTER TABLE noms ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE noms ADD CONSTRAINT FK_A069E65DB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE noms ADD CONSTRAINT FK_A069E65D896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_A069E65DB03A8386 ON noms (created_by_id)');
        $this->addSql('CREATE INDEX IDX_A069E65D896DBBDE ON noms (updated_by_id)');
        $this->addSql('ALTER TABLE prenoms ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE prenoms ADD CONSTRAINT FK_E71162E3B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE prenoms ADD CONSTRAINT FK_E71162E3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_E71162E3B03A8386 ON prenoms (created_by_id)');
        $this->addSql('CREATE INDEX IDX_E71162E3896DBBDE ON prenoms (updated_by_id)');
        $this->addSql('ALTER TABLE professions ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE professions ADD CONSTRAINT FK_2FDA85FAB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE professions ADD CONSTRAINT FK_2FDA85FA896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_2FDA85FAB03A8386 ON professions (created_by_id)');
        $this->addSql('CREATE INDEX IDX_2FDA85FA896DBBDE ON professions (updated_by_id)');
        $this->addSql('ALTER TABLE regions ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_A26779F3B03A8386 ON regions (created_by_id)');
        $this->addSql('CREATE INDEX IDX_A26779F3896DBBDE ON regions (updated_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cercles DROP FOREIGN KEY FK_45C1718DB03A8386');
        $this->addSql('ALTER TABLE cercles DROP FOREIGN KEY FK_45C1718D896DBBDE');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A5B03A8386');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A5896DBBDE');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927FB03A8386');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927F896DBBDE');
        $this->addSql('ALTER TABLE noms DROP FOREIGN KEY FK_A069E65DB03A8386');
        $this->addSql('ALTER TABLE noms DROP FOREIGN KEY FK_A069E65D896DBBDE');
        $this->addSql('ALTER TABLE prenoms DROP FOREIGN KEY FK_E71162E3B03A8386');
        $this->addSql('ALTER TABLE prenoms DROP FOREIGN KEY FK_E71162E3896DBBDE');
        $this->addSql('ALTER TABLE professions DROP FOREIGN KEY FK_2FDA85FAB03A8386');
        $this->addSql('ALTER TABLE professions DROP FOREIGN KEY FK_2FDA85FA896DBBDE');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3B03A8386');
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3896DBBDE');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX IDX_45C1718DB03A8386 ON cercles');
        $this->addSql('DROP INDEX IDX_45C1718D896DBBDE ON cercles');
        $this->addSql('ALTER TABLE cercles DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('DROP INDEX IDX_5C5EE2A5B03A8386 ON communes');
        $this->addSql('DROP INDEX IDX_5C5EE2A5896DBBDE ON communes');
        $this->addSql('ALTER TABLE communes DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('DROP INDEX IDX_49F8927FB03A8386 ON lieu_naissances');
        $this->addSql('DROP INDEX IDX_49F8927F896DBBDE ON lieu_naissances');
        $this->addSql('ALTER TABLE lieu_naissances DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('DROP INDEX IDX_A069E65DB03A8386 ON noms');
        $this->addSql('DROP INDEX IDX_A069E65D896DBBDE ON noms');
        $this->addSql('ALTER TABLE noms DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('DROP INDEX IDX_E71162E3B03A8386 ON prenoms');
        $this->addSql('DROP INDEX IDX_E71162E3896DBBDE ON prenoms');
        $this->addSql('ALTER TABLE prenoms DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('DROP INDEX IDX_2FDA85FAB03A8386 ON professions');
        $this->addSql('DROP INDEX IDX_2FDA85FA896DBBDE ON professions');
        $this->addSql('ALTER TABLE professions DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
        $this->addSql('DROP INDEX IDX_A26779F3B03A8386 ON regions');
        $this->addSql('DROP INDEX IDX_A26779F3896DBBDE ON regions');
        $this->addSql('ALTER TABLE regions DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP slug');
    }
}
