<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCartItem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                // 'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cart_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'default' => '0',
            ],
            'product_id' => [
                'type'           => 'INT',
                'default' => '0',
            ],
            'product_price' => [
                'type'           => 'BIGINT',
                'default' => '0',
            ],
            'product_total' => [
                'type'           => 'INT',
                'default' => '0',
            ],
            'product_price_total' => [
                'type'           => 'BIGINT',
                'default' => '0',
            ],
            'color' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'size' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'info_1' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'info_2' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'info_3' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'info_4' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'info_5' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('cart_id', 'carts', 'id');
        $this->forge->createTable('cart_items');
    }

    public function down()
    {
        //
    }
}
