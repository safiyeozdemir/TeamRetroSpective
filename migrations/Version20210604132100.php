<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210604132100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE comment_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment_group (id INT NOT NULL, retroid_id INT NOT NULL, commentid_id INT NOT NULL, commenttype_id INT NOT NULL, group_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C45ADC3414EB7395 ON comment_group (retroid_id)');
        $this->addSql('CREATE INDEX IDX_C45ADC344574CA0 ON comment_group (commentid_id)');
        $this->addSql('CREATE INDEX IDX_C45ADC34F66C3302 ON comment_group (commenttype_id)');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC3414EB7395 FOREIGN KEY (retroid_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC344574CA0 FOREIGN KEY (commentid_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC34F66C3302 FOREIGN KEY (commenttype_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comment_group_id_seq CASCADE');
        $this->addSql('DROP TABLE comment_group');
    }
}
