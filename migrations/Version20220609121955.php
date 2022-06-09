<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609121955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE furniture ALTER furnitures_types_id SET NOT NULL');
        $this->addSql('ALTER TABLE test ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE test ADD mark INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE test DROP date');
        $this->addSql('ALTER TABLE test DROP mark');
        $this->addSql('ALTER TABLE furniture ALTER furnitures_types_id DROP NOT NULL');
    }
}
