<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002092848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP ecriture, DROP artistes, DROP costumes, DROP musique, DROP lumiere, DROP dossier_spec');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD ecriture VARCHAR(255) NOT NULL, ADD artistes VARCHAR(255) NOT NULL, ADD costumes VARCHAR(255) NOT NULL, ADD musique VARCHAR(255) NOT NULL, ADD lumiere VARCHAR(255) NOT NULL, ADD dossier_spec VARCHAR(255) DEFAULT NULL');
    }
}
