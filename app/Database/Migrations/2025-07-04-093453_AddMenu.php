<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMenu extends Migration
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
            'parent_id' => [
                'type'           => 'INT',
                'default' => '0',
            ],
            'name' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'type' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'type_id' => [
                'type'           => 'INT',
                'default' => '0',
            ],
            'link' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'sort' => [
                'type'           => 'INT',
                'default' => '0',
            ],
            'state' => [
                'type'           => 'TINYINT',
                'default' => '0',
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus');
    }

    public function down()
    {
        //
    }
}
