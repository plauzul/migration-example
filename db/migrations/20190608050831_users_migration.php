<?php

use Phinx\Migration\AbstractMigration;

class UsersMigration extends AbstractMigration
{

    /**
     * Change Method.
     */
    public function change()
    {
        $table = $this->table('users', ['id' => 'id_user']);
        $table->addColumn('email', 'string')
              ->addColumn('password', 'string')
              ->addColumn('created_at', 'datetime', ['null' => true])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->addIndex(['email'], ['unique' => true])
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
