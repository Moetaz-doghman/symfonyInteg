<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304110157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entretient (id INT AUTO_INCREMENT NOT NULL, id_rec_id INT DEFAULT NULL, date DATE NOT NULL, type VARCHAR(255) NOT NULL, resultat VARCHAR(255) NOT NULL, INDEX IDX_E34739B4305E0476 (id_rec_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recrutement (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entretient ADD CONSTRAINT FK_E34739B4305E0476 FOREIGN KEY (id_rec_id) REFERENCES recrutement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretient DROP FOREIGN KEY FK_E34739B4305E0476');
        $this->addSql('DROP TABLE entretient');
        $this->addSql('DROP TABLE recrutement');
    }
}
