<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Trang',
            'type'    => 'pages',
            'state'    => '1',
            'model'    => 'PageModel',
        ];
        $this->db->table('menu_types')->insert($data);

        $data = [
            'name' => 'Danh mục tin tức',
            'type'    => 'newscats',
            'state'    => '1',
            'model'    => 'NewsCatModel',
        ];
        $this->db->table('menu_types')->insert($data);

        $data = [
            'name' => 'Tin tức',
            'type'    => 'posts',
            'state'    => '1',
            'model'    => 'PostModel',
        ];
        $this->db->table('menu_types')->insert($data);

        $data = [
            'name' => 'Danh mục sản phẩm',
            'type'    => 'productcats',
            'state'    => '1',
            'model'    => 'ProductCatModel',
        ];
        $this->db->table('menu_types')->insert($data);

        $data = [
            'name' => 'Sản phẩm',
            'type'    => 'products',
            'state'    => '1',
            'model'    => 'ProductModel',
        ];
        $this->db->table('menu_types')->insert($data);

        $data = [
            'name' => 'Khác',
            'type'    => 'menu_specials',
            'state'    => '1',
            'model'    => 'MenuSpecialModel',
        ];
        $this->db->table('menu_types')->insert($data);
    }
}
