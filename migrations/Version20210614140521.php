<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614140521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE comment_like_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment_like (id INT NOT NULL, like_user_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8A55E25FF4E399B6 ON comment_like (like_user_id)');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT FK_8A55E25FF4E399B6 FOREIGN KEY (like_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ALTER comment_user_id DROP NOT NULL');
        $this->addSql('ALTER TABLE comment ALTER retro_id DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comment_like_id_seq CASCADE');
        $this->addSql('DROP TABLE comment_like');
        $this->addSql('ALTER TABLE comment ALTER comment_user_id SET NOT NULL');
        $this->addSql('ALTER TABLE comment ALTER retro_id SET NOT NULL');
    }
}
