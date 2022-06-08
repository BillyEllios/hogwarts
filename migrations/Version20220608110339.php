<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608110339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE furniture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE furniture (id INT NOT NULL, students_id INT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_665DDAB31AD8D010 ON furniture (students_id)');
        $this->addSql('CREATE TABLE furniture_course (furniture_id INT NOT NULL, course_id INT NOT NULL, PRIMARY KEY(furniture_id, course_id))');
        $this->addSql('CREATE INDEX IDX_935B41EBCF5485C3 ON furniture_course (furniture_id)');
        $this->addSql('CREATE INDEX IDX_935B41EB591CC992 ON furniture_course (course_id)');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB31AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE furniture_course ADD CONSTRAINT FK_935B41EBCF5485C3 FOREIGN KEY (furniture_id) REFERENCES furniture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE furniture_course ADD CONSTRAINT FK_935B41EB591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE furniture_course DROP CONSTRAINT FK_935B41EBCF5485C3');
        $this->addSql('DROP SEQUENCE furniture_id_seq CASCADE');
        $this->addSql('DROP TABLE furniture');
        $this->addSql('DROP TABLE furniture_course');
    }
}
