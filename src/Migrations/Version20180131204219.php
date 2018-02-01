<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180131204219 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer ADD u_answer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25E0D7CE31 FOREIGN KEY (u_answer_id) REFERENCES user_answer (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A25E0D7CE31 ON answer (u_answer_id)');
        $this->addSql('ALTER TABLE user ADD user_answer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answer (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649AAD3C5E3 ON user (user_answer_id)');
        $this->addSql('ALTER TABLE user_answer ADD users INT NOT NULL, ADD user_answers INT NOT NULL, DROP user, DROP user_answer');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25E0D7CE31');
        $this->addSql('DROP INDEX IDX_DADD4A25E0D7CE31 ON answer');
        $this->addSql('ALTER TABLE answer DROP u_answer_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AAD3C5E3');
        $this->addSql('DROP INDEX IDX_8D93D649AAD3C5E3 ON user');
        $this->addSql('ALTER TABLE user DROP user_answer_id');
        $this->addSql('ALTER TABLE user_answer ADD user INT NOT NULL, ADD user_answer INT NOT NULL, DROP users, DROP user_answers');
    }
}
