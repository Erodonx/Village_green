<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008142801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AA61846038');
        $this->addSql('DROP INDEX IDX_1E6639AA61846038 ON requete');
        $this->addSql('ALTER TABLE requete CHANGE employe_concerne_id employe_id INT NOT NULL');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AA1B65292 FOREIGN KEY (employe_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1E6639AA1B65292 ON requete (employe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE requete DROP FOREIGN KEY FK_1E6639AA1B65292');
        $this->addSql('DROP INDEX IDX_1E6639AA1B65292 ON requete');
        $this->addSql('ALTER TABLE requete CHANGE employe_id employe_concerne_id INT NOT NULL');
        $this->addSql('ALTER TABLE requete ADD CONSTRAINT FK_1E6639AA61846038 FOREIGN KEY (employe_concerne_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1E6639AA61846038 ON requete (employe_concerne_id)');
    }
}
