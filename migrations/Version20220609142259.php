<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609142259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE furniture_type_course (furniture_type_id INT NOT NULL, course_id INT NOT NULL, PRIMARY KEY(furniture_type_id, course_id))');
        $this->addSql('CREATE INDEX IDX_E6E7788240AC7965 ON furniture_type_course (furniture_type_id)');
        $this->addSql('CREATE INDEX IDX_E6E77882591CC992 ON furniture_type_course (course_id)');
        $this->addSql('ALTER TABLE furniture_type_course ADD CONSTRAINT FK_E6E7788240AC7965 FOREIGN KEY (furniture_type_id) REFERENCES furniture_type (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE furniture_type_course ADD CONSTRAINT FK_E6E77882591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE test ALTER name TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE furniture_type_course');
        $this->addSql('ALTER TABLE test ALTER name TYPE VARCHAR(255)');
    }
}
