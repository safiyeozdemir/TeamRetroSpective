<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608084438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brain_storm DROP CONSTRAINT fk_4c04f0558e0a285');
        $this->addSql('ALTER TABLE brain_storm DROP CONSTRAINT fk_4c04f0514eb7395');
        $this->addSql('DROP INDEX idx_4c04f0558e0a285');
        $this->addSql('DROP INDEX idx_4c04f0514eb7395');
        $this->addSql('ALTER TABLE brain_storm ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE brain_storm ADD retro_id INT NOT NULL');
        $this->addSql('ALTER TABLE brain_storm DROP userid_id');
        $this->addSql('ALTER TABLE brain_storm DROP retroid_id');
        $this->addSql('ALTER TABLE brain_storm ADD CONSTRAINT FK_4C04F05A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE brain_storm ADD CONSTRAINT FK_4C04F05BB3D2DC9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4C04F05A76ED395 ON brain_storm (user_id)');
        $this->addSql('CREATE INDEX IDX_4C04F05BB3D2DC9 ON brain_storm (retro_id)');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526c58e0a285');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT fk_9474526c14eb7395');
        $this->addSql('DROP INDEX idx_9474526c14eb7395');
        $this->addSql('DROP INDEX idx_9474526c58e0a285');
        $this->addSql('ALTER TABLE comment ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD retro_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment DROP userid_id');
        $this->addSql('ALTER TABLE comment DROP retroid_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBB3D2DC9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526CBB3D2DC9 ON comment (retro_id)');
        $this->addSql('ALTER TABLE comment_group DROP CONSTRAINT fk_c45adc3414eb7395');
        $this->addSql('ALTER TABLE comment_group DROP CONSTRAINT fk_c45adc344574ca0');
        $this->addSql('DROP INDEX idx_c45adc3414eb7395');
        $this->addSql('DROP INDEX idx_c45adc344574ca0');
        $this->addSql('ALTER TABLE comment_group ADD retro_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_group ADD comment_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_group DROP retroid_id');
        $this->addSql('ALTER TABLE comment_group DROP commentid_id');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC34BB3D2DC9 FOREIGN KEY (retro_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT FK_C45ADC34F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C45ADC34BB3D2DC9 ON comment_group (retro_id)');
        $this->addSql('CREATE INDEX IDX_C45ADC34F8697D13 ON comment_group (comment_id)');
        $this->addSql('ALTER TABLE comment_like DROP CONSTRAINT fk_8a55e25f4574ca0');
        $this->addSql('ALTER TABLE comment_like DROP CONSTRAINT fk_8a55e25f58e0a285');
        $this->addSql('DROP INDEX idx_8a55e25f4574ca0');
        $this->addSql('DROP INDEX idx_8a55e25f58e0a285');
        $this->addSql('ALTER TABLE comment_like ADD comment_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_like ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_like DROP commentid_id');
        $this->addSql('ALTER TABLE comment_like DROP userid_id');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT FK_8A55E25FF8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT FK_8A55E25FA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8A55E25FF8697D13 ON comment_like (comment_id)');
        $this->addSql('CREATE INDEX IDX_8A55E25FA76ED395 ON comment_like (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE brain_storm DROP CONSTRAINT FK_4C04F05A76ED395');
        $this->addSql('ALTER TABLE brain_storm DROP CONSTRAINT FK_4C04F05BB3D2DC9');
        $this->addSql('DROP INDEX IDX_4C04F05A76ED395');
        $this->addSql('DROP INDEX IDX_4C04F05BB3D2DC9');
        $this->addSql('ALTER TABLE brain_storm ADD userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE brain_storm ADD retroid_id INT NOT NULL');
        $this->addSql('ALTER TABLE brain_storm DROP user_id');
        $this->addSql('ALTER TABLE brain_storm DROP retro_id');
        $this->addSql('ALTER TABLE brain_storm ADD CONSTRAINT fk_4c04f0558e0a285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE brain_storm ADD CONSTRAINT fk_4c04f0514eb7395 FOREIGN KEY (retroid_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_4c04f0558e0a285 ON brain_storm (userid_id)');
        $this->addSql('CREATE INDEX idx_4c04f0514eb7395 ON brain_storm (retroid_id)');
        $this->addSql('ALTER TABLE comment_group DROP CONSTRAINT FK_C45ADC34BB3D2DC9');
        $this->addSql('ALTER TABLE comment_group DROP CONSTRAINT FK_C45ADC34F8697D13');
        $this->addSql('DROP INDEX IDX_C45ADC34BB3D2DC9');
        $this->addSql('DROP INDEX IDX_C45ADC34F8697D13');
        $this->addSql('ALTER TABLE comment_group ADD retroid_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_group ADD commentid_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_group DROP retro_id');
        $this->addSql('ALTER TABLE comment_group DROP comment_id');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT fk_c45adc3414eb7395 FOREIGN KEY (retroid_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_group ADD CONSTRAINT fk_c45adc344574ca0 FOREIGN KEY (commentid_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_c45adc3414eb7395 ON comment_group (retroid_id)');
        $this->addSql('CREATE INDEX idx_c45adc344574ca0 ON comment_group (commentid_id)');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CBB3D2DC9');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526CBB3D2DC9');
        $this->addSql('ALTER TABLE comment ADD userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD retroid_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment DROP user_id');
        $this->addSql('ALTER TABLE comment DROP retro_id');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c58e0a285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c14eb7395 FOREIGN KEY (retroid_id) REFERENCES retro (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9474526c14eb7395 ON comment (retroid_id)');
        $this->addSql('CREATE INDEX idx_9474526c58e0a285 ON comment (userid_id)');
        $this->addSql('ALTER TABLE comment_like DROP CONSTRAINT FK_8A55E25FF8697D13');
        $this->addSql('ALTER TABLE comment_like DROP CONSTRAINT FK_8A55E25FA76ED395');
        $this->addSql('DROP INDEX IDX_8A55E25FF8697D13');
        $this->addSql('DROP INDEX IDX_8A55E25FA76ED395');
        $this->addSql('ALTER TABLE comment_like ADD commentid_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_like ADD userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment_like DROP comment_id');
        $this->addSql('ALTER TABLE comment_like DROP user_id');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT fk_8a55e25f4574ca0 FOREIGN KEY (commentid_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_like ADD CONSTRAINT fk_8a55e25f58e0a285 FOREIGN KEY (userid_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_8a55e25f4574ca0 ON comment_like (commentid_id)');
        $this->addSql('CREATE INDEX idx_8a55e25f58e0a285 ON comment_like (userid_id)');
    }
}
