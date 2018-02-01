<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180131232053 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_answer ADD test_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_answer ADD CONSTRAINT FK_BF8F51181E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('CREATE INDEX IDX_BF8F51181E5D0459 ON user_answer (test_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_answer DROP FOREIGN KEY FK_BF8F51181E5D0459');
        $this->addSql('DROP INDEX IDX_BF8F51181E5D0459 ON user_answer');
        $this->addSql('ALTER TABLE user_answer DROP test_id');
    }
}
