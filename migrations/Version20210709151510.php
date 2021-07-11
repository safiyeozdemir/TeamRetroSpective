<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709151510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE retro_user ADD retro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE retro_user ADD CONSTRAINT FK_BB194B90BB3D2DC9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BB194B90BB3D2DC9 ON retro_user (retro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE retro_user DROP CONSTRAINT FK_BB194B90BB3D2DC9');
        $this->addSql('DROP INDEX IDX_BB194B90BB3D2DC9');
        $this->addSql('ALTER TABLE retro_user DROP retro_id');
    }
}
