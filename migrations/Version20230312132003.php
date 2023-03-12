<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230312132003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE park_district (park_id INT NOT NULL, district_id INT NOT NULL, INDEX IDX_70360B9D44990C25 (park_id), INDEX IDX_70360B9DB08FA272 (district_id), PRIMARY KEY(park_id, district_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE park_district ADD CONSTRAINT FK_70360B9D44990C25 FOREIGN KEY (park_id) REFERENCES park (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE park_district ADD CONSTRAINT FK_70360B9DB08FA272 FOREIGN KEY (district_id) REFERENCES district (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE park_district DROP FOREIGN KEY FK_70360B9D44990C25');
        $this->addSql('ALTER TABLE park_district DROP FOREIGN KEY FK_70360B9DB08FA272');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE park_district');
    }
}
