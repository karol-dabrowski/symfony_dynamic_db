<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20201215134917 extends AbstractMigration
{
	private const TABLE_NAME = 'products';

    public function up(Schema $schema): void
    {
	    $table = $schema->createTable(self::TABLE_NAME);

	    $table->addColumn('id', 'integer', ['autoincrement' => true]);
	    $table->addColumn('name', 'string', ['length' => 100]);

	    $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
	    $schema->dropTable(self::TABLE_NAME);
    }
}
