<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContact extends Migration
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
            'note' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'       => 'datetime',
                'null' => true,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contacts');
    }

    public function down()
    {
        //
    }
}
