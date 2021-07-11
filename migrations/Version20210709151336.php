<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709151336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE retro_user DROP CONSTRAINT fk_bb194b90bb3d2dc9');
        $this->addSql('DROP INDEX idx_bb194b90bb3d2dc9');
        $this->addSql('ALTER TABLE retro_user DROP retro_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE retro_user ADD retro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE retro_user ADD CONSTRAINT fk_bb194b90bb3d2dc9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_bb194b90bb3d2dc9 ON retro_user (retro_id)');
    }
}
