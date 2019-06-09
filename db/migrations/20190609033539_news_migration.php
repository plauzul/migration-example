<?php

use Phinx\Migration\AbstractMigration;

class NewsMigration extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $table = $this->table('news', ['id' => 'id_new']);
        $table->addColumn('title', 'string')
              ->addColumn('description', 'string')
              ->addColumn('is_logged', 'boolean', ['default' => false])
              ->addColumn('created_at', 'datetime', ['null' => true])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->create();
    }

    /**
     * Migrate Up.
     */
    public function up()
    {

    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
