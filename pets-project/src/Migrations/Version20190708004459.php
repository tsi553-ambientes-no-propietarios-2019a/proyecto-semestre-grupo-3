<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708004459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE anuncio (id INT AUTO_INCREMENT NOT NULL, idtipo_id INT DEFAULT NULL, idcateg_id INT DEFAULT NULL, iduser_id INT DEFAULT NULL, idcanton_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, descr LONGTEXT NOT NULL, INDEX IDX_4B3BC0D476233C02 (idtipo_id), INDEX IDX_4B3BC0D442C2131F (idcateg_id), INDEX IDX_4B3BC0D4786A81FB (iduser_id), INDEX IDX_4B3BC0D4F31CA4FE (idcanton_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D476233C02 FOREIGN KEY (idtipo_id) REFERENCES tipo_anuncio (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D442C2131F FOREIGN KEY (idcateg_id) REFERENCES categ_pet (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D4786A81FB FOREIGN KEY (iduser_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D4F31CA4FE FOREIGN KEY (idcanton_id) REFERENCES cantones (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE anuncio');
    }
}
