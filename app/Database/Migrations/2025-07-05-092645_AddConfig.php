<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddConfig extends Migration
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
            'title' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'description' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'keyword' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'intro' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'logo' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'icon' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'banner_1' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'banner_2' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'banner_3' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'banner_4' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'banner_5' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_1' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_2' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_3' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_4' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_5' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_6' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_7' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_8' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_9' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content_home_10' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'embed_code_header' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'embed_code_footer' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('configs');
    }

    public function down()
    {
        //
    }
}
