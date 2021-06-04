<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210604132743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE comment_like_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment_like (id INT NOT NULL, commentid_id INT NOT NULL, userid_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8A55E25F4574CA0 ON comment_like (commentid_id)');
        $this->addSql('CREATE INDEX IDX_8A55E25F58E0A285 ON comment_like (userid_id)');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT FK_8A55E25F4574CA0 FOREIGN KEY (commentid_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT FK_8A55E25F58E0A285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comment_like_id_seq CASCADE');
        $this->addSql('DROP TABLE comment_like');
    }
}
