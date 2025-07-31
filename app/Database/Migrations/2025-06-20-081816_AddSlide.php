<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlide extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                // 'constraint'     => 5,
                // 'unsigned'       => true,
                'auto_increment' => true,
            ],
            'image' => [
                'type'       => 'TEXT',
                // 'constraint' => '100',
                'null' => true,
                'collation' => 'utf8_general_ci',
            ],
            'sort' => [
                'type'       => 'INT',
                'default' => '0',
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('slides');
    }

    public function down()
    {
        //
    }
}
