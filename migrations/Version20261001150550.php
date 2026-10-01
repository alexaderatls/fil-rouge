<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261001150550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, date_commande DATETIME NOT NULL, numero_commande VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, detail LONGTEXT DEFAULT NULL, fournisseur_id INT NOT NULL, INDEX IDX_6EEAA67D670C757F (fournisseur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, siret VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, typeintervention VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, dateintervention DATETIME NOT NULL, client_id INT NOT NULL, technicien_id INT NOT NULL, INDEX IDX_D11814AB19EB6921 (client_id), INDEX IDX_D11814AB13457256 (technicien_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, quantite_utilise INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_18D2B0918EAE3863 (intervention_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patron (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, quantite INT NOT NULL, reference VARCHAR(255) NOT NULL, prix_unitaire INT NOT NULL, UNIQUE INDEX UNIQ_4B3656608CDE5729 (type), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technicien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB13457256 FOREIGN KEY (technicien_id) REFERENCES technicien (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B0918EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D670C757F');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB19EB6921');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB13457256');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B0918EAE3863');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE patron');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE technicien');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
