<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230831090306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sub_menus (id INT AUTO_INCREMENT NOT NULL, article_id_id INT DEFAULT NULL, category_id_id INT DEFAULT NULL, menu_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, submenu_order INT DEFAULT NULL, is_visible TINYINT(1) NOT NULL, link VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9E316C768F3EC46 (article_id_id), UNIQUE INDEX UNIQ_9E316C769777D11E (category_id_id), INDEX IDX_9E316C76EEE8BD30 (menu_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sub_menus ADD CONSTRAINT FK_9E316C768F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE sub_menus ADD CONSTRAINT FK_9E316C769777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE sub_menus ADD CONSTRAINT FK_9E316C76EEE8BD30 FOREIGN KEY (menu_id_id) REFERENCES menu (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_menus DROP FOREIGN KEY FK_9E316C768F3EC46');
        $this->addSql('ALTER TABLE sub_menus DROP FOREIGN KEY FK_9E316C769777D11E');
        $this->addSql('ALTER TABLE sub_menus DROP FOREIGN KEY FK_9E316C76EEE8BD30');
        $this->addSql('DROP TABLE sub_menus');
    }
}
