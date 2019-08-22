<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190820082604 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actualite_user DROP FOREIGN KEY FK_C63578C2A76ED395');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9D86650F');
        $this->addSql('ALTER TABLE streaming_user DROP FOREIGN KEY FK_504B3762A76ED395');
        $this->addSql('DROP TABLE actualite_user');
        $this->addSql('DROP TABLE streaming_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_6EEAA67D9D86650F ON commande');
        $this->addSql('ALTER TABLE commande DROP user_id_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actualite_user (actualite_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C63578C2A2843073 (actualite_id), INDEX IDX_C63578C2A76ED395 (user_id), PRIMARY KEY(actualite_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE streaming_user (streaming_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_504B3762429AEC72 (streaming_id), INDEX IDX_504B3762A76ED395 (user_id), PRIMARY KEY(streaming_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, role VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, nom VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, mail VARCHAR(80) NOT NULL COLLATE utf8mb4_unicode_ci, adresse VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, code_postal TEXT NOT NULL COLLATE utf8mb4_unicode_ci, ville VARCHAR(80) NOT NULL COLLATE utf8mb4_unicode_ci, telephone TEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, collection VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE actualite_user ADD CONSTRAINT FK_C63578C2A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_user ADD CONSTRAINT FK_C63578C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE streaming_user ADD CONSTRAINT FK_504B3762429AEC72 FOREIGN KEY (streaming_id) REFERENCES streaming (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE streaming_user ADD CONSTRAINT FK_504B3762A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D9D86650F ON commande (user_id_id)');
    }
}
