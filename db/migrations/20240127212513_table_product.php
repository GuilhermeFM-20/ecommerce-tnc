<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableProduct extends AbstractMigration
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
    public function change(): void
    {

        $this->execute('DROP TABLE IF EXISTS products;');

        $products = $this->table('products');
        $products->addColumn('code','string')
              ->addColumn('name','text')
              ->addColumn('price','decimal',['length' => 10, 'scale' => 2])
              ->addColumn('amount','decimal',['length' => 10, 'scale' => 2])
              ->addColumn('image','text')
              ->addColumn('description','text')
              ->addColumn('category_fk','biginteger')
              ->addColumn('brand_fk','biginteger')
              ->addColumn('width','decimal',['length' => 10, 'scale' => 2])
              ->addColumn('height','decimal',['length' => 10, 'scale' => 2])
              ->addColumn('weight','decimal',['length' => 10, 'scale' => 2])
              ->addColumn('color','string')
              ->addColumn('created_at', 'datetime', ['null' => false])
              ->addColumn('updated_at', 'datetime', ['null' => false])
              ->addColumn('status','datetime',['null'=>true])
              ->create();     
    }
}
