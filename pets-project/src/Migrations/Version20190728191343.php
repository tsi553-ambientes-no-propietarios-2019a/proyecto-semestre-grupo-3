<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD:pets-project/src/Migrations/Version20190728152522.php
final class Version20190728152522 extends AbstractMigration
=======
final class Version20190728191343 extends AbstractMigration
>>>>>>> RamaChat:pets-project/src/Migrations/Version20190728191343.php
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

<<<<<<< HEAD:pets-project/src/Migrations/Version20190728152522.php
        $this->addSql('ALTER TABLE city CHANGE name name VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE country CHANGE name name VARCHAR(120) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE name name VARCHAR(120) DEFAULT NULL');
=======
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, comment LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_9474526CF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF624B39D FOREIGN KEY (sender_id) REFERENCES fos_user (id)');
>>>>>>> RamaChat:pets-project/src/Migrations/Version20190728191343.php
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

<<<<<<< HEAD:pets-project/src/Migrations/Version20190728152522.php
        $this->addSql('ALTER TABLE city CHANGE name name VARCHAR(150) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE country CHANGE name name VARCHAR(120) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE fos_user CHANGE name name VARCHAR(120) NOT NULL COLLATE utf8mb4_unicode_ci');
=======
        $this->addSql('DROP TABLE comment');
>>>>>>> RamaChat:pets-project/src/Migrations/Version20190728191343.php
    }
}
