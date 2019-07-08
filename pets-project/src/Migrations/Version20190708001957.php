<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708001957 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, id_canton_id INT DEFAULT NULL, nom_user VARCHAR(255) NOT NULL, apel_user VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, telf_user VARCHAR(15) NOT NULL, pass_user VARCHAR(255) NOT NULL, INDEX IDX_EF687F2D32B12C (id_canton_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F2D32B12C FOREIGN KEY (id_canton_id) REFERENCES cantones (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE usuarios');
    }
}
