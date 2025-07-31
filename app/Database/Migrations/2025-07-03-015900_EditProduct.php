<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EditProduct extends Migration
{
    public function up()
    {
        $fields = [
		    'product_shap' => [
		        'name' => 'product_shape',
		        'type' => 'TEXT',
		        'null' => true,
		    ],
		];

		// $fields = 'RENAME COLUMN product_shap TO product_shape';
		// ALTER TABLE contacts  MODIFY last_name varchar(50) NULL;
		// $this->forge->modifyColumn('products', $fields);
		// gives ALTER TABLE `table_name` CHANGE `old_name` `new_name` TEXT NOT NULL

		$fields = [
		    'product_state_1' => ['type' => 'TINYINT', 'default' => '0', 'null' => false, 'after' => 'product_hot'],
		    'product_state_2' => ['type' => 'TINYINT', 'default' => '0', 'null' => false, 'after' => 'product_hot'],
		];
		$this->forge->addColumn('products', $fields);
    }

    public function down()
    {
        //
    }
}
