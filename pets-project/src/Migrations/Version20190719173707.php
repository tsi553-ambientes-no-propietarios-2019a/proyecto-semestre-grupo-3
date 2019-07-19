<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190719173707 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE type_ad (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_pets (id INT AUTO_INCREMENT NOT NULL, typepets_id INT DEFAULT NULL, categorypets_id INT DEFAULT NULL, cantons_id INT DEFAULT NULL, tittle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status INT NOT NULL, INDEX IDX_3EF7B85A1F014858 (typepets_id), INDEX IDX_3EF7B85A333EE91B (categorypets_id), INDEX IDX_3EF7B85A702E63A0 (cantons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_pets (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad_pets ADD CONSTRAINT FK_3EF7B85A1F014858 FOREIGN KEY (typepets_id) REFERENCES type_ad (id)');
        $this->addSql('ALTER TABLE ad_pets ADD CONSTRAINT FK_3EF7B85A333EE91B FOREIGN KEY (categorypets_id) REFERENCES category_pets (id)');
        $this->addSql('ALTER TABLE ad_pets ADD CONSTRAINT FK_3EF7B85A702E63A0 FOREIGN KEY (cantons_id) REFERENCES canton (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ad_pets DROP FOREIGN KEY FK_3EF7B85A1F014858');
        $this->addSql('ALTER TABLE ad_pets DROP FOREIGN KEY FK_3EF7B85A333EE91B');
        $this->addSql('DROP TABLE type_ad');
        $this->addSql('DROP TABLE ad_pets');
        $this->addSql('DROP TABLE category_pets');
    }
}
