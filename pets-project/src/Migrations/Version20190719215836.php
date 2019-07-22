<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190719215836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE provincias (id INT AUTO_INCREMENT NOT NULL, nom_prov VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cantones (id INT AUTO_INCREMENT NOT NULL, idprov_id INT DEFAULT NULL, nom_canton VARCHAR(255) NOT NULL, INDEX IDX_D8A1A95E24DCF20F (idprov_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categ_pet (id INT AUTO_INCREMENT NOT NULL, desc_pet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, id_canton_id INT DEFAULT NULL, nom_user VARCHAR(255) NOT NULL, apel_user VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, telf_user VARCHAR(15) NOT NULL, pass_user VARCHAR(255) NOT NULL, INDEX IDX_EF687F2D32B12C (id_canton_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anuncio (id INT AUTO_INCREMENT NOT NULL, idtipo_id INT DEFAULT NULL, idcateg_id INT DEFAULT NULL, iduser_id INT DEFAULT NULL, idcanton_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, descr LONGTEXT NOT NULL, INDEX IDX_4B3BC0D476233C02 (idtipo_id), INDEX IDX_4B3BC0D442C2131F (idcateg_id), INDEX IDX_4B3BC0D4786A81FB (iduser_id), INDEX IDX_4B3BC0D4F31CA4FE (idcanton_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_anuncio (id INT AUTO_INCREMENT NOT NULL, desc_tipo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cantones ADD CONSTRAINT FK_D8A1A95E24DCF20F FOREIGN KEY (idprov_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE usuarios ADD CONSTRAINT FK_EF687F2D32B12C FOREIGN KEY (id_canton_id) REFERENCES cantones (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D476233C02 FOREIGN KEY (idtipo_id) REFERENCES tipo_anuncio (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D442C2131F FOREIGN KEY (idcateg_id) REFERENCES categ_pet (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D4786A81FB FOREIGN KEY (iduser_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE anuncio ADD CONSTRAINT FK_4B3BC0D4F31CA4FE FOREIGN KEY (idcanton_id) REFERENCES cantones (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cantones DROP FOREIGN KEY FK_D8A1A95E24DCF20F');
        $this->addSql('ALTER TABLE usuarios DROP FOREIGN KEY FK_EF687F2D32B12C');
        $this->addSql('ALTER TABLE anuncio DROP FOREIGN KEY FK_4B3BC0D4F31CA4FE');
        $this->addSql('ALTER TABLE anuncio DROP FOREIGN KEY FK_4B3BC0D442C2131F');
        $this->addSql('ALTER TABLE anuncio DROP FOREIGN KEY FK_4B3BC0D4786A81FB');
        $this->addSql('ALTER TABLE anuncio DROP FOREIGN KEY FK_4B3BC0D476233C02');
        $this->addSql('DROP TABLE provincias');
        $this->addSql('DROP TABLE cantones');
        $this->addSql('DROP TABLE categ_pet');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE anuncio');
        $this->addSql('DROP TABLE tipo_anuncio');
    }
}
