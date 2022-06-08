<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602094033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE house ADD house_master_id INT NOT NULL');
        $this->addSql('ALTER TABLE house ADD name VARCHAR(32) NOT NULL');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399DE80405CF FOREIGN KEY (house_master_id) REFERENCES teachers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67D5399DE80405CF ON house (house_master_id)');
        $this->addSql('ALTER TABLE students ADD house_id INT NOT NULL');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB26BB74515 FOREIGN KEY (house_id) REFERENCES house (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A4698DB26BB74515 ON students (house_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE house DROP CONSTRAINT FK_67D5399DE80405CF');
        $this->addSql('DROP INDEX UNIQ_67D5399DE80405CF');
        $this->addSql('ALTER TABLE house DROP house_master_id');
        $this->addSql('ALTER TABLE house DROP name');
        $this->addSql('ALTER TABLE students DROP CONSTRAINT FK_A4698DB26BB74515');
        $this->addSql('DROP INDEX IDX_A4698DB26BB74515');
        $this->addSql('ALTER TABLE students DROP house_id');
    }
}
