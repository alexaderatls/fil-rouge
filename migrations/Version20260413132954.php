<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260413132954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE client ADD prenom VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, DROP prénom, DROP téléphone');
        $this->addSql('ALTER TABLE commande CHANGE n°commande numero_commande VARCHAR(255) NOT NULL, CHANGE détail detail LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE fournisseur CHANGE prénom prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB13457256 FOREIGN KEY (technicien_id) REFERENCES technicien (id)');
        $this->addSql('ALTER TABLE materiel CHANGE quantité_utilisé quantite_utilise INT NOT NULL');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B0918EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE patron ADD prenom VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, DROP prénom, DROP téléphone');
        $this->addSql('ALTER TABLE stock CHANGE quantité quantite INT NOT NULL, CHANGE référence reference VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE technicien CHANGE prénom prenom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `user`');
        $this->addSql('ALTER TABLE client ADD prénom VARCHAR(255) NOT NULL, ADD téléphone VARCHAR(255) NOT NULL, DROP prenom, DROP telephone');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D670C757F');
        $this->addSql('ALTER TABLE commande CHANGE numero_commande n°commande VARCHAR(255) NOT NULL, CHANGE detail détail LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE prenom prénom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB19EB6921');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB13457256');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B0918EAE3863');
        $this->addSql('ALTER TABLE materiel CHANGE quantite_utilise quantité_utilisé INT NOT NULL');
        $this->addSql('ALTER TABLE patron ADD prénom VARCHAR(255) NOT NULL, ADD téléphone VARCHAR(255) NOT NULL, DROP prenom, DROP telephone');
        $this->addSql('ALTER TABLE stock CHANGE quantite quantité INT NOT NULL, CHANGE reference référence VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE technicien CHANGE prenom prénom VARCHAR(255) NOT NULL');
    }
}
