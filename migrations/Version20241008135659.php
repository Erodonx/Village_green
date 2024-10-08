<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008135659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contenu_requete (id INT AUTO_INCREMENT NOT NULL, requete_id INT NOT NULL, message VARCHAR(1000) NOT NULL, INDEX IDX_D615F45A18FB544F (requete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE requete (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, employe_concerne_id INT NOT NULL, sujet VARCHAR(50) NOT NULL, INDEX IDX_1E6639AA19EB6921 (client_id), INDEX IDX_1E6639AA61846038 (employe_concerne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contenu_requete ADD CONSTRAINT FK_D615F45A18FB544F FOREIGN KEY (requete_id) REFERENCES requete (id)');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AA19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AA61846038 FOREIGN KEY (employe_concerne_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenu_requete DROP FOREIGN KEY FK_D615F45A18FB544F');
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AA19EB6921');
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AA61846038');
        $this->addSql('DROP TABLE contenu_requete');
        $this->addSql('DROP TABLE requete');
    }
}
