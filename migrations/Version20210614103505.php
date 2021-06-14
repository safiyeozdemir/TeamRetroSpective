<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614103505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE comment_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment_group (id INT NOT NULL, retro_id INT NOT NULL, commnet_group_id INT NOT NULL, group_name VARCHAR(60) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C45ADC34BB3D2DC9 ON comment_group (retro_id)');
        $this->addSql('CREATE INDEX IDX_C45ADC34B1A3990B ON comment_group (commnet_group_id)');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC34BB3D2DC9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC34B1A3990B FOREIGN KEY (commnet_group_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comment_group_id_seq CASCADE');
        $this->addSql('DROP TABLE comment_group');
    }
}
