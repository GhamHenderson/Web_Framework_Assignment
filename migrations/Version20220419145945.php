<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419145945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE begin_at begin_at DATETIME NOT NULL, CHANGE title title VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE booking DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE booking CHANGE id id INT DEFAULT NULL, CHANGE begin_at begin_at DATETIME DEFAULT NULL, CHANGE title title MEDIUMTEXT DEFAULT NULL');
    }
}
