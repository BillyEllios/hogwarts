<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602092706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE house_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE house (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE students ADD stud_number_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB2FFABFD6E FOREIGN KEY (stud_number_id) REFERENCES house (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A4698DB2FFABFD6E ON students (stud_number_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE students DROP CONSTRAINT FK_A4698DB2FFABFD6E');
        $this->addSql('DROP SEQUENCE house_id_seq CASCADE');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP INDEX IDX_A4698DB2FFABFD6E');
        $this->addSql('ALTER TABLE students DROP stud_number_id');
    }
}
