<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuType extends Migration
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
            'type' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'model' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'state' => [
                'type'           => 'TINYINT',
                'default' => '0',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu_types');
    }

    public function down()
    {
        //
    }
}
