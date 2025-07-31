<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProductCat extends Migration
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
            'title' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'description' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'keyword' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'title_seo' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'des_seo' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'state' => [
                'type'       => 'INT',
                'default' => '0',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null' => true,
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
        $this->forge->createTable('productcats');
    }

    public function down()
    {
        //
    }
}
