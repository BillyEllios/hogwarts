<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609142944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE quiddich_team_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE quiddich_team (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE student ADD quiddich_team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A10F48E4 FOREIGN KEY (quiddich_team_id) REFERENCES quiddich_team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B723AF33A10F48E4 ON student (quiddich_team_id)');
        $this->addSql('ALTER TABLE test ALTER name TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT FK_B723AF33A10F48E4');
        $this->addSql('DROP SEQUENCE quiddich_team_id_seq CASCADE');
        $this->addSql('DROP TABLE quiddich_team');
        $this->addSql('DROP INDEX IDX_B723AF33A10F48E4');
        $this->addSql('ALTER TABLE student DROP quiddich_team_id');
        $this->addSql('ALTER TABLE test ALTER name TYPE VARCHAR(255)');
    }
}
