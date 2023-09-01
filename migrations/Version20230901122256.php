<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230901122256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_sub_menus DROP FOREIGN KEY FK_87710B42AEABF5DD');
        $this->addSql('ALTER TABLE menu_sub_menus DROP FOREIGN KEY FK_87710B42CCD7E912');
        $this->addSql('DROP TABLE menu_sub_menus');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_sub_menus (menu_id INT NOT NULL, sub_menus_id INT NOT NULL, INDEX IDX_87710B42CCD7E912 (menu_id), INDEX IDX_87710B42AEABF5DD (sub_menus_id), PRIMARY KEY(menu_id, sub_menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_sub_menus ADD CONSTRAINT FK_87710B42AEABF5DD FOREIGN KEY (sub_menus_id) REFERENCES sub_menus (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_sub_menus ADD CONSTRAINT FK_87710B42CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
