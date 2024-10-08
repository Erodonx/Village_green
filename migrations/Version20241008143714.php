<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008143714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AAA38132E3');
        $this->addSql('DROP INDEX IDX_1E6639AAA38132E3 ON requete');
        $this->addSql('ALTER TABLE requete CHANGE requete_employe_id employe_mess_id INT NOT NULL');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AAB5C3895E FOREIGN KEY (employe_mess_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1E6639AAB5C3895E ON requete (employe_mess_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AAB5C3895E');
        $this->addSql('DROP INDEX IDX_1E6639AAB5C3895E ON requete');
        $this->addSql('ALTER TABLE requete CHANGE employe_mess_id requete_employe_id INT NOT NULL');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AAA38132E3 FOREIGN KEY (requete_employe_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1E6639AAA38132E3 ON requete (requete_employe_id)');
    }
}
