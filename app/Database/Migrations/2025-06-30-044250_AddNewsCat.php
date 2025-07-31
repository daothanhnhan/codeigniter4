<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewsCat extends Migration
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
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'title' => [
                'type'       => 'TEXT',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            // 'slug' => [
            //     'type'       => 'TEXT',
            //     // 'constraint' => '100',
            //     'null' => true,
            //     'collate' => 'utf8_unicode_ci',
            // ],
            'description' => [
                'type'       => 'TEXT',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'content' => [
                'type'       => 'LONGTEXT',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'keyword' => [
                'type'       => 'TEXT',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'title_seo' => [
                'type'       => 'TEXT',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'des_seo' => [
                'type'       => 'TEXT',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'state' => [
                'type'       => 'INT',
                // 'constraint' => '100',
                // 'null' => true,
                // 'collation' => 'utf8_general_ci',
                'default' => '0',
            ],
            
            'created_at' => [
                'type'       => 'DATETIME',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                // 'constraint' => '100',
                'null' => true,
                // 'collation' => 'utf8_general_ci',
            ],
            'creator_id' => [
                'type'       => 'INT',
                'default' => '0',
            ],
            'parent_id' => [
                'type'       => 'INT',
                'default' => '0',
            ],
            'sort' => [
                'type'       => 'INT',
                'default' => '0',
            ],
            'info_1' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_2' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_3' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_4' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_5' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
        ]);
        
        $this->forge->addField("slug text COLLATE utf8_unicode_ci DEFAULT NULL");
        $this->forge->addKey('id', true);
        $this->forge->createTable('newscats');
    }

    public function down()
    {
        //
    }
}
