<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260302133511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Costumer (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, active TINYINT NOT NULL, enddate DATE NOT NULL, Department VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user__user (username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles JSON NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, id INT AUTO_INCREMENT NOT NULL, UNIQUE INDEX UNIQ_32745D0A92FC23A8 (username_canonical), UNIQUE INDEX UNIQ_32745D0AA0D96FBF (email_canonical), UNIQUE INDEX UNIQ_32745D0AC05FB297 (confirmation_token), UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE TimeEntry (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, checkinTime DATETIME NOT NULL, checkoutTime DATETIME DEFAULT NULL, INDEX IDX_988949E1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE TimeEntry ADD CONSTRAINT FK_988949E1A76ED395 FOREIGN KEY (user_id) REFERENCES Costumer (id) ON DELETE CASCADE');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_dateTime DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ordered_item NUMERIC(4, 2) NOT NULL, tax SMALLINT NOT NULL, Costumer_id INT DEFAULT NULL, INDEX IDX_F5299398E62B9E85 (Costumer_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398E62B9E85 FOREIGN KEY (Costumer_id) REFERENCES Costumer (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE TimeEntry');
        $this->addSql('DROP TABLE user__fa');
        $this->addSql('DROP TABLE Costumer');
        $this->addSql('DROP TABLE TimeEntry');
        $this->addSql('DROP TABLE order');
    }
}
