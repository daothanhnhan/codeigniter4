<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Together extends BaseController
{
    public function index()
    {
        //
    }

    public static function slug_add ($model, $slug) {
        $tableModel = model($model);

        $table = $tableModel->where('slug', $slug)->first();

        if (empty($table)) {
            return $slug;
        } else {
            $arr = explode('-', $slug);
            if (is_numeric(end($arr))) {
                $i = end($arr);
                array_pop($arr);
                $arr[]     = ++$i;
                $slug_new = implode('-', $arr);
            } else {
                $slug_new = $slug . '-1';
            }

            return $slug_new;
        }
    }

    public static function slug_edit ($model, $slug, $id) {
        $tableModel = model($model);

        // kiểm tra xem slug có thay đổi hay không.
        // kiểm tra slug trong db và trong đầu vào.
        $table_id = $tableModel->where('id', $id)->first();
        // dd($page_id['slug']);
        if ($table_id['slug'] == $slug) {
            return $slug;
        }

        // kiểm tra xem có bị trùng hay không.
        $table_slug = $tableModel->where('slug', $slug)->first();

        if (empty($table_slug)) {
            return $slug;
        } else {
            $arr = explode('-', $slug);
            if (is_numeric(end($arr))) {
                $i = end($arr);
                array_pop($arr);
                $arr[]     = ++$i;
                $slug_new = implode('-', $arr);
            } else {
                $slug_new = $slug . '-1';
            }

            return $slug_new;
        }
    }

    public static function check_url_menu () {
        $url = uri_string();
        $arr = ['user', 'slide', 'page', 'newscat', 'post', 'productcat', 'product', 'cart', 'config', 'menu', 'contact', 'video'];

        foreach ($arr as $item) {
            $pos = strpos($url, $item);
            if ($pos !== false) {
                return $item;
            }
        }

        return '';
    }
}
