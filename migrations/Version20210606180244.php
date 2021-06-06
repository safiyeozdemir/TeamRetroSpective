<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210606180244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE discuss_id_seq CASCADE');
        $this->addSql('DROP TABLE discuss');
        $this->addSql('ALTER TABLE retro ADD team_name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE retro ALTER retro_name TYPE VARCHAR(100)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE discuss_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE discuss (id INT NOT NULL, userid_id INT NOT NULL, user_discuss VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c5ab8be058e0a285 ON discuss (userid_id)');
        $this->addSql('ALTER TABLE discuss ADD CONSTRAINT fk_c5ab8be058e0a285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE retro DROP team_name');
        $this->addSql('ALTER TABLE retro ALTER retro_name TYPE VARCHAR(150)');
    }
}
