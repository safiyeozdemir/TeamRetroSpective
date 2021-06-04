<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210604115730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE brain_storm_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE retro_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE brain_storm (id INT NOT NULL, userid_id INT NOT NULL, retroid_id INT NOT NULL, user_happy VARCHAR(255) NOT NULL, user_less VARCHAR(255) NOT NULL, user_next VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C04F0558E0A285 ON brain_storm (userid_id)');
        $this->addSql('CREATE INDEX IDX_4C04F0514EB7395 ON brain_storm (retroid_id)');
        $this->addSql('CREATE TABLE retro (id INT NOT NULL, retro_link VARCHAR(255) NOT NULL, retro_name VARCHAR(150) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, user_name VARCHAR(30) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE brain_storm ADD CONSTRAINT FK_4C04F0558E0A285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE brain_storm ADD CONSTRAINT FK_4C04F0514EB7395 FOREIGN KEY (retroid_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE brain_storm DROP CONSTRAINT FK_4C04F0514EB7395');
        $this->addSql('ALTER TABLE brain_storm DROP CONSTRAINT FK_4C04F0558E0A285');
        $this->addSql('DROP SEQUENCE brain_storm_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE retro_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE brain_storm');
        $this->addSql('DROP TABLE retro');
        $this->addSql('DROP TABLE "user"');
    }
}
