<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMenuSpecial extends Migration
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
            'link' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'state' => [
                'type'           => 'INT',
                'default' => '0',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu_specials');
    }

    public function down()
    {
        //
    }
}
