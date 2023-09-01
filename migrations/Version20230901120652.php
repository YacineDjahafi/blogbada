<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230901120652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_sub_menus (menu_id INT NOT NULL, sub_menus_id INT NOT NULL, INDEX IDX_87710B42CCD7E912 (menu_id), INDEX IDX_87710B42AEABF5DD (sub_menus_id), PRIMARY KEY(menu_id, sub_menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_sub_menus ADD CONSTRAINT FK_87710B42CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_sub_menus ADD CONSTRAINT FK_87710B42AEABF5DD FOREIGN KEY (sub_menus_id) REFERENCES sub_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu DROP FOREIGN KEY FK_B54ACADD8CCD27AB');
        $this->addSql('ALTER TABLE menu_menu DROP FOREIGN KEY FK_B54ACADD95287724');
        $this->addSql('DROP TABLE menu_menu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_menu (menu_source INT NOT NULL, menu_target INT NOT NULL, INDEX IDX_B54ACADD8CCD27AB (menu_source), INDEX IDX_B54ACADD95287724 (menu_target), PRIMARY KEY(menu_source, menu_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_menu ADD CONSTRAINT FK_B54ACADD8CCD27AB FOREIGN KEY (menu_source) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_menu ADD CONSTRAINT FK_B54ACADD95287724 FOREIGN KEY (menu_target) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_sub_menus DROP FOREIGN KEY FK_87710B42CCD7E912');
        $this->addSql('ALTER TABLE menu_sub_menus DROP FOREIGN KEY FK_87710B42AEABF5DD');
        $this->addSql('DROP TABLE menu_sub_menus');
    }
}
