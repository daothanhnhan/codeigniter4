<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCart extends Migration
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
            'name' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'email' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'phone' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'address' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'note' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'note_cart' => [
                'type'       => 'TEXT',
                'null' => true,
            ],

            'state' => [
                'type'           => 'TINYINT',
                'default' => '0',
            ],
            'creator_id' => [
                'type'           => 'INT',
                'default' => '0',
            ],
            'total_price' => [
                'type'           => 'BIGINT',
                'default' => '0',
            ],
            'total_cart' => [
                'type'           => 'INT',
                'default' => '0',
            ],

            'created_at' => [
                'type'       => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'datetime',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('carts');
    }

    public function down()
    {
        //
    }
}
