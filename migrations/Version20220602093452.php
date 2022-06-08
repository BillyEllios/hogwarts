<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602093452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE students DROP CONSTRAINT fk_a4698db2ffabfd6e');
        $this->addSql('DROP INDEX idx_a4698db2ffabfd6e');
        $this->addSql('ALTER TABLE students DROP stud_number_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE students ADD stud_number_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT fk_a4698db2ffabfd6e FOREIGN KEY (stud_number_id) REFERENCES house (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_a4698db2ffabfd6e ON students (stud_number_id)');
    }
}
