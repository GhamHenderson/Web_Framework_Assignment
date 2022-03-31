<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331114842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651CC54C8C93');
        $this->addSql('DROP INDEX IDX_7B00651CC54C8C93 ON status');
        $this->addSql('ALTER TABLE status ADD status_type VARCHAR(255) NOT NULL, DROP type_id');
        $this->addSql('ALTER TABLE `table` ADD status_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `table` ADD CONSTRAINT FK_F6298F46CD9CFB16 FOREIGN KEY (status_type_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_F6298F46CD9CFB16 ON `table` (status_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE status ADD type_id INT DEFAULT NULL, DROP status_type');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651CC54C8C93 FOREIGN KEY (type_id) REFERENCES `table` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7B00651CC54C8C93 ON status (type_id)');
        $this->addSql('ALTER TABLE `table` DROP FOREIGN KEY FK_F6298F46CD9CFB16');
        $this->addSql('DROP INDEX IDX_F6298F46CD9CFB16 ON `table`');
        $this->addSql('ALTER TABLE `table` DROP status_type_id');
    }
}
