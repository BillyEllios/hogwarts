<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608132041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE furniture_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE furniture_type (id INT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE furniture ADD furnitures_types_id INT NOT NULL');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB37A225021 FOREIGN KEY (furnitures_types_id) REFERENCES furniture_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_665DDAB37A225021 ON furniture (furnitures_types_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE furniture DROP CONSTRAINT FK_665DDAB37A225021');
        $this->addSql('DROP SEQUENCE furniture_type_id_seq CASCADE');
        $this->addSql('DROP TABLE furniture_type');
        $this->addSql('DROP INDEX IDX_665DDAB37A225021');
        $this->addSql('ALTER TABLE furniture DROP furnitures_types_id');
    }
}
