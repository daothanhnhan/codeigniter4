<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVideo extends Migration
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
            'image' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('videos');
    }

    public function down()
    {
        //
    }
}
