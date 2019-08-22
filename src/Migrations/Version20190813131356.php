<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190813131356 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE support (id INT AUTO_INCREMENT NOT NULL, produit_id_id INT DEFAULT NULL, type_support VARCHAR(50) NOT NULL, prix INT NOT NULL, INDEX IDX_8004EBA54FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, commande_id_id INT DEFAULT NULL, support_id INT DEFAULT NULL, numero_commande INT NOT NULL, numero_support INT NOT NULL, INDEX IDX_3170B74B462C4194 (commande_id_id), INDEX IDX_3170B74B315B405 (support_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE streaming (id INT AUTO_INCREMENT NOT NULL, produit_id_id INT DEFAULT NULL, titre_morceau VARCHAR(100) NOT NULL, qualite VARCHAR(50) DEFAULT NULL, prix INT NOT NULL, INDEX IDX_264318614FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE streaming_user (streaming_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_504B3762429AEC72 (streaming_id), INDEX IDX_504B3762A76ED395 (user_id), PRIMARY KEY(streaming_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, style VARCHAR(50) DEFAULT NULL, presentation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, role VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, mail VARCHAR(80) NOT NULL, adresse VARCHAR(100) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(80) NOT NULL, telephone INT DEFAULT NULL, collection VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, date_production DATETIME NOT NULL, presentation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, numero_commande INT NOT NULL, date_commande DATETIME NOT NULL, montant INT NOT NULL, statut VARCHAR(20) NOT NULL, INDEX IDX_6EEAA67D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, artiste_id_id INT DEFAULT NULL, type VARCHAR(50) NOT NULL, date_debut VARCHAR(50) NOT NULL, date_fin VARCHAR(50) NOT NULL, lieu VARCHAR(80) DEFAULT NULL, ville VARCHAR(80) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, prix INT NOT NULL, INDEX IDX_B26681EB6D84A9 (artiste_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, thematique VARCHAR(100) DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, date_publication DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualite_user (actualite_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C63578C2A2843073 (actualite_id), INDEX IDX_C63578C2A76ED395 (user_id), PRIMARY KEY(actualite_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE support ADD CONSTRAINT FK_8004EBA54FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B462C4194 FOREIGN KEY (commande_id_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B315B405 FOREIGN KEY (support_id) REFERENCES support (id)');
        $this->addSql('ALTER TABLE streaming ADD CONSTRAINT FK_264318614FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE streaming_user ADD CONSTRAINT FK_504B3762429AEC72 FOREIGN KEY (streaming_id) REFERENCES streaming (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE streaming_user ADD CONSTRAINT FK_504B3762A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EB6D84A9 FOREIGN KEY (artiste_id_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE actualite_user ADD CONSTRAINT FK_C63578C2A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_user ADD CONSTRAINT FK_C63578C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B315B405');
        $this->addSql('ALTER TABLE streaming_user DROP FOREIGN KEY FK_504B3762429AEC72');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EB6D84A9');
        $this->addSql('ALTER TABLE streaming_user DROP FOREIGN KEY FK_504B3762A76ED395');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9D86650F');
        $this->addSql('ALTER TABLE actualite_user DROP FOREIGN KEY FK_C63578C2A76ED395');
        $this->addSql('ALTER TABLE support DROP FOREIGN KEY FK_8004EBA54FD8F9C3');
        $this->addSql('ALTER TABLE streaming DROP FOREIGN KEY FK_264318614FD8F9C3');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B462C4194');
        $this->addSql('ALTER TABLE actualite_user DROP FOREIGN KEY FK_C63578C2A2843073');
        $this->addSql('DROP TABLE support');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE streaming');
        $this->addSql('DROP TABLE streaming_user');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE actualite_user');
    }
}
