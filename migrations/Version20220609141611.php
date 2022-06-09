<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609141611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE furniture_course');
        $this->addSql('ALTER TABLE test ALTER name TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE furniture_course (furniture_id INT NOT NULL, course_id INT NOT NULL, PRIMARY KEY(furniture_id, course_id))');
        $this->addSql('CREATE INDEX idx_935b41eb591cc992 ON furniture_course (course_id)');
        $this->addSql('CREATE INDEX idx_935b41ebcf5485c3 ON furniture_course (furniture_id)');
        $this->addSql('ALTER TABLE furniture_course ADD CONSTRAINT fk_935b41ebcf5485c3 FOREIGN KEY (furniture_id) REFERENCES furniture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE furniture_course ADD CONSTRAINT fk_935b41eb591cc992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE test ALTER name TYPE VARCHAR(255)');
    }
}
