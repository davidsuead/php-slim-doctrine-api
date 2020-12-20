<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201220123949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create table user and insert a row';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $path = str_replace(['\src\Migrations', '/src/Migrations'], '', __DIR__);
        $this->addSql(file_get_contents($path . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR . 'create-table-user.sql'));
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('
            DROP TABLE IF EXISTS token;
            DROP TABLE IF EXISTS user;
        ');
    }
}
