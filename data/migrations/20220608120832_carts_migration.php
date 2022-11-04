<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CartsMigration extends AbstractMigration
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
        $table = $this->table('carts');
        $table
            ->addColumn('user_id', 'integer', [
                'null' => false
            ])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP'
            ])
            ->addForeignKey('user_id', 'users', 'id', [
                'constraint' => 'user_cart',
                'delete'=> 'RESTRICT',
                'update'=> 'CASCADE'
            ]);
        $table->create();
    }
}
