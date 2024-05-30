<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530085311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, category_id INT NOT NULL, nom_etablissement VARCHAR(255) NOT NULL, ville_etablissement VARCHAR(255) NOT NULL, distanciel TINYINT(1) NOT NULL, date_d DATETIME NOT NULL, date_f DATETIME DEFAULT NULL, nom_formation VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, INDEX IDX_404021BFB3E9C81 (niveau_id), INDEX IDX_404021BF12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veille (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date_d DATETIME NOT NULL, acquisition VARCHAR(255) NOT NULL, veille_continue TINYINT(1) NOT NULL, INDEX IDX_CE188CF312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE veille ADD CONSTRAINT FK_CE188CF312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFB3E9C81');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF12469DE2');
        $this->addSql('ALTER TABLE veille DROP FOREIGN KEY FK_CE188CF312469DE2');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE veille');
    }
}
