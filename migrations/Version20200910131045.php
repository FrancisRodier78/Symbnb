<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200910131045 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, booker_id INT NOT NULL, ad_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_at DATETIME NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_E00CEDDE8B7E4006 (booker_id), INDEX IDX_E00CEDDE4F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE8B7E4006 FOREIGN KEY (booker_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE4F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id)');
        $this->addSql('DROP TABLE bookin');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookin (id INT AUTO_INCREMENT NOT NULL, booker_id INT NOT NULL, ad_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, creat_date DATETIME NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_D66EB04B4F34D596 (ad_id), INDEX IDX_D66EB04B8B7E4006 (booker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bookin ADD CONSTRAINT FK_D66EB04B4F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id)');
        $this->addSql('ALTER TABLE bookin ADD CONSTRAINT FK_D66EB04B8B7E4006 FOREIGN KEY (booker_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE booking');
    }
}
