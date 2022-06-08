<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608105055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test ADD courses_id INT NOT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CF9295384 FOREIGN KEY (courses_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D87F7E0CF9295384 ON test (courses_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE test DROP CONSTRAINT FK_D87F7E0CF9295384');
        $this->addSql('DROP INDEX IDX_D87F7E0CF9295384');
        $this->addSql('ALTER TABLE test DROP courses_id');
    }
}
