<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSpecialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Trang chủ',
            'link'    => '/',
            'state'    => '1',
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('menu_specials')->insert($data);


        $data = [
            'name' => 'Tất cả tin tức',
            'link'    => '/tat-ca-tin-tuc',
            'state'    => '1',
        ];
        $this->db->table('menu_specials')->insert($data);

        $data = [
            'name' => 'Tất cả sản phẩm',
            'link'    => '/tat-ca-san-pham',
            'state'    => '1',
        ];
        $this->db->table('menu_specials')->insert($data);

        $data = [
            'name' => 'Liên hệ',
            'link'    => '/lien-he',
            'state'    => '1',
        ];
        $this->db->table('menu_specials')->insert($data);

        $data = [
            'name' => 'Đăng ký',
            'link'    => '/dang-ky',
            'state'    => '0',
        ];
        $this->db->table('menu_specials')->insert($data);

        $data = [
            'name' => 'Đăng nhập',
            'link'    => '/dang-nhap',
            'state'    => '0',
        ];
        $this->db->table('menu_specials')->insert($data);
    }
}
