<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419153220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09E238517C');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME DEFAULT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checkout (id INT AUTO_INCREMENT NOT NULL, seat_id INT DEFAULT NULL, name_on_card VARCHAR(255) NOT NULL, card_number VARCHAR(255) NOT NULL, expiry_date DATE NOT NULL, INDEX IDX_AF382D4EC1DAFE35 (seat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE checkout ADD CONSTRAINT FK_AF382D4EC1DAFE35 FOREIGN KEY (seat_id) REFERENCES `table` (id)');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE product DROP image');
        $this->addSql('ALTER TABLE `table` ADD status_type_id INT DEFAULT NULL, DROP table_available');
        $this->addSql('ALTER TABLE `table` ADD CONSTRAINT FK_F6298F46CD9CFB16 FOREIGN KEY (status_type_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_F6298F46CD9CFB16 ON `table` (status_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `table` DROP FOREIGN KEY FK_F6298F46CD9CFB16');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, order_ref_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_52EA1F094584665A (product_id), INDEX IDX_52EA1F09E238517C (order_ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (userId INT AUTO_INCREMENT NOT NULL, firstname TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, lastname TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, username VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT \'0\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, password VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'0\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, confirmPassword VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, email VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'0\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, phone VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'0\' NOT NULL COLLATE `utf8mb4_0900_ai_ci`, gender TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, country TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, city TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, dateRegister DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(userId)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09E238517C FOREIGN KEY (order_ref_id) REFERENCES `order` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE checkout');
        $this->addSql('DROP TABLE status');
        $this->addSql('ALTER TABLE product ADD image VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_F6298F46CD9CFB16 ON `table`');
        $this->addSql('ALTER TABLE `table` ADD table_available TINYINT(1) NOT NULL, DROP status_type_id');
    }
}
