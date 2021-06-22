<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618093744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE retro ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE retro ADD start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE retro ADD end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE retro ADD cereated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE retro ADD is_finished BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE retro ADD CONSTRAINT FK_DA34E4B29D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DA34E4B29D86650F ON retro (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE retro DROP CONSTRAINT FK_DA34E4B29D86650F');
        $this->addSql('DROP INDEX IDX_DA34E4B29D86650F');
        $this->addSql('ALTER TABLE retro DROP user_id_id');
        $this->addSql('ALTER TABLE retro DROP start_date');
        $this->addSql('ALTER TABLE retro DROP end_date');
        $this->addSql('ALTER TABLE retro DROP cereated_at');
        $this->addSql('ALTER TABLE retro DROP is_finished');
    }
}
