<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableBrand extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(){

        
        $this->execute('DROP TABLE IF EXISTS brands;');

        $users = $this->table('brands');
        $users->addColumn('name', 'string', ['limit' => 100])
              ->addColumn('icon', 'text')
              ->addColumn('status', 'datetime', ['null' => true])
              ->addColumn('created_at', 'datetime', ['null' => false])
              ->addColumn('updated_at', 'datetime', ['null' => false])
              ->create();

    }
}
