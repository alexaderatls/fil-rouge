<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260409102749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, date_commande DATETIME NOT NULL, n°commande VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, détail LONGTEXT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_6EEAA67D670C757F (fournisseur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prénom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, siret VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE patron (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prénom VARCHAR(255) NOT NULL, téléphone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB13457256 FOREIGN KEY (technicien_id) REFERENCES technicien (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B0918EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D670C757F');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE patron');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB19EB6921');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB13457256');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B0918EAE3863');
    }
}
