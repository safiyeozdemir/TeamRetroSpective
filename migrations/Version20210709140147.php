<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709140147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE retro_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE retro_user (id INT NOT NULL, retro_id INT DEFAULT NULL, user_id INT DEFAULT NULL, step INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BB194B90BB3D2DC9 ON retro_user (retro_id)');
        $this->addSql('CREATE INDEX IDX_BB194B90A76ED395 ON retro_user (user_id)');
        $this->addSql('ALTER TABLE retro_user ADD CONSTRAINT FK_BB194B90BB3D2DC9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE retro_user ADD CONSTRAINT FK_BB194B90A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE retro_user_id_seq CASCADE');
        $this->addSql('DROP TABLE retro_user');
    }
}
