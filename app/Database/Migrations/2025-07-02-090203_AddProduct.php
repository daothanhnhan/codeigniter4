<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProduct extends Migration
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
            'image_sub' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'title' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
        ]);
		$this->forge->addField("slug text COLLATE utf8_unicode_ci DEFAULT NULL");
		$this->forge->addField([
            'description' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'content' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'price' => [
                'type'       => 'BIGINT',
                'default' => '0',
            ],
            'price_sale' => [
                'type'       => 'BIGINT',
                'default' => '0',
            ],
            'product_code' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_shape' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_size' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_brand' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_origin' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_text_1' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_text_2' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_text_3' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_text_4' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_text_5' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'product_text_6' => [
                'type'       => 'TEXT',
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
            'product_new' => [
                'type'       => 'TINYINT',
                'default' => '0',
            ],
            'product_hot' => [
                'type'       => 'TINYINT',
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
            'productcat_id' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'sort' => [
                'type'       => 'INT',
                'default' => '0',
            ],
            'views' => [
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
            'info_6' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_7' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_8' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_9' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
            'info_10' => [
                'type'       => 'LONGTEXT',
                'null' => true,
            ],
        ]);
        // omit product_state_1, product_state_2
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        //
    }
}
