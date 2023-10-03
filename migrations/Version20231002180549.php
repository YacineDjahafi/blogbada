<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002180549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD dates VARCHAR(100) NOT NULL, ADD age VARCHAR(255) NOT NULL, ADD duration VARCHAR(100) NOT NULL, ADD is_visible TINYINT(1) NOT NULL, ADD article_order INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9312469DE2');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A937294869C');
        $this->addSql('DROP INDEX IDX_7D053A9312469DE2 ON menu');
        $this->addSql('DROP INDEX IDX_7D053A937294869C ON menu');
        $this->addSql('ALTER TABLE menu DROP article_id, DROP category_id');
        $this->addSql('ALTER TABLE sub_menus DROP FOREIGN KEY FK_9E316C7612469DE2');
        $this->addSql('ALTER TABLE sub_menus DROP FOREIGN KEY FK_9E316C767294869C');
        $this->addSql('DROP INDEX UNIQ_9E316C7612469DE2 ON sub_menus');
        $this->addSql('DROP INDEX UNIQ_9E316C767294869C ON sub_menus');
        $this->addSql('ALTER TABLE sub_menus DROP article_id, DROP category_id');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP dates, DROP age, DROP duration, DROP is_visible, DROP article_order');
        $this->addSql('ALTER TABLE menu ADD article_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A937294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7D053A9312469DE2 ON menu (category_id)');
        $this->addSql('CREATE INDEX IDX_7D053A937294869C ON menu (article_id)');
        $this->addSql('ALTER TABLE sub_menus ADD article_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_menus ADD CONSTRAINT FK_9E316C7612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sub_menus ADD CONSTRAINT FK_9E316C767294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E316C7612469DE2 ON sub_menus (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E316C767294869C ON sub_menus (article_id)');
        $this->addSql('ALTER TABLE user DROP email');
    }
}
