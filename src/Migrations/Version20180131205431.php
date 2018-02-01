<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180131205431 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_answer ADD user_id INT DEFAULT NULL, ADD user_answer_id INT DEFAULT NULL, DROP user, DROP user_answer');
        $this->addSql('ALTER TABLE user_answer ADD CONSTRAINT FK_BF8F5118A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_answer ADD CONSTRAINT FK_BF8F5118AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES answer (id)');
        $this->addSql('CREATE INDEX IDX_BF8F5118A76ED395 ON user_answer (user_id)');
        $this->addSql('CREATE INDEX IDX_BF8F5118AAD3C5E3 ON user_answer (user_answer_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_answer DROP FOREIGN KEY FK_BF8F5118A76ED395');
        $this->addSql('ALTER TABLE user_answer DROP FOREIGN KEY FK_BF8F5118AAD3C5E3');
        $this->addSql('DROP INDEX IDX_BF8F5118A76ED395 ON user_answer');
        $this->addSql('DROP INDEX IDX_BF8F5118AAD3C5E3 ON user_answer');
        $this->addSql('ALTER TABLE user_answer ADD user INT NOT NULL, ADD user_answer INT NOT NULL, DROP user_id, DROP user_answer_id');
    }
}
