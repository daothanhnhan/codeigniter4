<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\Admin\Together;

class Config extends BaseController
{
	protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
        // dd(uri_string());
        $data = $this->get_config_id();
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/config/edit', $data);
    }

    public function update () {
        $validationRule_logo = [
            'logo' => [
                'label' => 'Image logo',
                'rules' => [
                    'uploaded[logo]',
                    'is_image[logo]',
                    'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[image,100]',
                    // 'max_dims[image,1024,768]',
                ],
            ],
        ];

        $validationRule_icon = [
            'icon' => [
                'label' => 'Image icon',
                'rules' => [
                    'uploaded[icon]',
                    'is_image[icon]',
                    'mime_in[icon,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[image,100]',
                    // 'max_dims[image,1024,768]',
                ],
            ],
        ];

        $img = $this->request->getFile('logo');
        if (!empty($img->getName())) {
            if (! $this->validateData([], $validationRule_logo)) {
            
                $error = $this->validator->getErrors();
                // dd($data);

                session()->setFlashdata('errors', $error);

                $data = $this->get_config_id();
                return view('admin/config/edit', $data);
            }

            $img = $this->request->getFile('logo');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $logo = $img_name_en.'.'.$extension;

            $path = 'uploads/config/' . $logo;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/config', $logo);
            } else {
                // đã có file upload
            }
        } else {
            $logo = '';
        }

        $img = $this->request->getFile('icon');
        if (!empty($img->getName())) {
            if (! $this->validateData([], $validationRule_icon)) {
            
                $error = $this->validator->getErrors();
                // dd($data);

                session()->setFlashdata('errors', $error);

                $data = $this->get_config_id();
                return view('admin/config/edit', $data);
            }

            $img = $this->request->getFile('icon');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $icon = $img_name_en.'.'.$extension;

            $path = 'uploads/config/' . $icon;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/config', $icon);
            } else {
                // đã có file upload
            }
        } else {
            $icon = '';
        }

        $img = $this->request->getFile('banner_1');
        if (!empty($img->getName())) {
            $img = $this->request->getFile('banner_1');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $banner_1 = $img_name_en.'.'.$extension;

            $path = 'uploads/config/' . $banner_1;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/config', $banner_1);
            } else {
                // đã có file upload
            }
        } else {
            $banner_1 = '';
        }

        $img = $this->request->getFile('banner_2');
        if (!empty($img->getName())) {
            $img = $this->request->getFile('banner_2');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $banner_2 = $img_name_en.'.'.$extension;

            $path = 'uploads/config/' . $banner_2;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/config', $banner_2);
            } else {
                // đã có file upload
            }
        } else {
            $banner_2 = '';
        }

        $img = $this->request->getFile('banner_3');
        if (!empty($img->getName())) {
            $img = $this->request->getFile('banner_3');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $banner_3 = $img_name_en.'.'.$extension;

            $path = 'uploads/config/' . $banner_3;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/config', $banner_3);
            } else {
                // đã có file upload
            }
        } else {
            $banner_3 = '';
        }

        // $img = $this->request->getFile('banner_4');
        // if (!empty($img->getName())) {
        //     $img = $this->request->getFile('banner_4');
        //     // pathinfo
        //     $img_name = remove_extension_file($img->getName());
        //     $extension = $img->getExtension();

        //     $img_name_en = mb_url_title($img_name, '-', true);

        //     $banner_4 = $img_name_en.'.'.$extension;

        //     $path = 'uploads/config/' . $banner_4;

        //     $file = new \CodeIgniter\Files\File($path);

        //     if (! $file->getRealPath()) {
        //         // chưa có file upload
        //         $filepath_bool = $img->move('uploads/config', $banner_4);
        //     } else {
        //         // đã có file upload
        //     }
        // } else {
        //     $banner_4 = '';
        // }

        // $img = $this->request->getFile('banner_5');
        // if (!empty($img->getName())) {
        //     $img = $this->request->getFile('banner_5');
        //     // pathinfo
        //     $img_name = remove_extension_file($img->getName());
        //     $extension = $img->getExtension();

        //     $img_name_en = mb_url_title($img_name, '-', true);

        //     $banner_5 = $img_name_en.'.'.$extension;

        //     $path = 'uploads/config/' . $banner_5;

        //     $file = new \CodeIgniter\Files\File($path);

        //     if (! $file->getRealPath()) {
        //         // chưa có file upload
        //         $filepath_bool = $img->move('uploads/config', $banner_5);
        //     } else {
        //         // đã có file upload
        //     }
        // } else {
        //     $banner_5 = '';
        // }
        
        $data_update = [
            'title' => $this->request->getPost()['title'],
            'keyword' => $this->request->getPost()['keyword'],
            'description' => $this->request->getPost()['description'],
            'intro' => $this->request->getPost()['intro'],

            'content_home_1' => $this->request->getPost()['content_home_1'],
            'content_home_2' => $this->request->getPost()['content_home_2'],
            'content_home_3' => $this->request->getPost()['content_home_3'],
            'content_home_4' => $this->request->getPost()['content_home_4'],
            'content_home_5' => $this->request->getPost()['content_home_5'],
            'content_home_6' => $this->request->getPost()['content_home_6'],
            'content_home_7' => $this->request->getPost()['content_home_7'],
            'content_home_8' => $this->request->getPost()['content_home_8'],
            'content_home_9' => $this->request->getPost()['content_home_9'],
            'content_home_10' => $this->request->getPost()['content_home_10'],
            'embed_code_header' => $this->request->getPost()['embed_code_header'],
            'embed_code_footer' => $this->request->getPost()['embed_code_footer'],
        ];

        if (!empty($logo)) {
        	$data_update['logo'] = $logo;
        }

        if (!empty($icon)) {
        	$data_update['icon'] = $icon;
        }

        if (!empty($banner_1)) {
        	$data_update['banner_1'] = $banner_1;
        }
        if (!empty($banner_2)) {
        	$data_update['banner_2'] = $banner_2;
        }
        if (!empty($banner_3)) {
        	$data_update['banner_3'] = $banner_3;
        }
        // if (!empty($banner_4)) {
        // 	$data_update['banner_4'] = $banner_4;
        // }
        // if (!empty($banner_5)) {
        // 	$data_update['banner_5'] = $banner_5;
        // }
        
        $configModel = model('ConfigModel');
        $configModel->update(1, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_config_id();
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/config/edit', $data);
        // $this->edit($id);
    }

    public function get_config_id () {
    	$configModel = model('ConfigModel');
        $config = $configModel->find(1);

        $checkbox = [
            'name'    => 'state',
            'class'      => 'form-check-input',
            'value'   => '1',
            // 'checked' => $state,
            // 'style'   => 'margin:10px',
        ];

        $data = [
            'config' => $config,
            // 'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function dashBoard()
    {
        $cart_count = model('CartModel')->countAll();
        $product_count = model('ProductModel')->countAll();
        $post_count = model('PostModel')->countAll();
        $page_count = model('PageModel')->countAll();
        $data = [
            'cart_count' => $cart_count,
            'product_count' => $product_count,
            'post_count' => $post_count,
            'page_count' => $page_count,
        ];
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/manager', $data);
    }

    public function sitemap () {
        $file = FCPATH.'sitemap.xml';//echo $file;die;
        // echo set_realpath($file, true);
        // $data = 'Some file data';

        // if (! write_file($file, $data)) {
        //     echo 'Unable to write the file';
        // } else {
        //     echo 'File written!';
        // }

        ///////////////////
        $doc = new \DOMDocument('1.0', 'utf-8');

        $root = $doc->createElement('urlset');

        $root->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $root->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $root->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        $doc->appendChild($root);

        $url = $doc->createElement('url');

        $root->appendChild($url);

        $loc = $doc->createElement('loc');//dd($_SERVER);
        $protocol = $_SERVER['REQUEST_SCHEME'];
        $domain = $protocol.'://'.$_SERVER['SERVER_NAME'];
        $loc->nodeValue = $domain;
        $url->appendChild($loc);

        $lastmod = $doc->createElement('lastmod');
        $date = date('Y-m-d\TH:i:s').'+00:00';
        $lastmod->nodeValue = $date;
        $url->appendChild($lastmod);

        $priority = $doc->createElement('priority');
        $priority->nodeValue = '1.00';
        $url->appendChild($priority);

        //////////////////////////////

        $list_procat = model('ProductCatModel')->findAll();

        foreach ($list_procat as $item) {
         $url = $doc->createElement('url');
         $root->appendChild($url);

         $loc = $doc->createElement('loc');
         $loc->nodeValue = $domain.'/danh-muc-san-pham/'.$item['slug'];
         $url->appendChild($loc);

         $lastmod = $doc->createElement('lastmod');
         $date = date('Y-m-d\TH:i:s').'+00:00';
         $lastmod->nodeValue = $date;
         $url->appendChild($lastmod);

         $priority = $doc->createElement('priority');
         $priority->nodeValue = '0.80';
         $url->appendChild($priority);
        }


        //////////////////////////////

        $list_pro = model('ProductModel')->findAll();

        foreach ($list_pro as $item) {
         $url = $doc->createElement('url');
         $root->appendChild($url);

         $loc = $doc->createElement('loc');
         $loc->nodeValue = $domain.'/san-pham/'.$item['slug'];
         $url->appendChild($loc);

         $lastmod = $doc->createElement('lastmod');
         $date = date('Y-m-d\TH:i:s').'+00:00';
         $lastmod->nodeValue = $date;
         $url->appendChild($lastmod);

         $priority = $doc->createElement('priority');
         $priority->nodeValue = '0.80';
         $url->appendChild($priority);
        }

        //////////////////////////////
        $list_newscat = model('NewsCatModel')->findAll();

        foreach ($list_newscat as $item) {
            $url = $doc->createElement('url');
            $root->appendChild($url);

            $loc = $doc->createElement('loc');
            $loc->nodeValue = $domain.'/danh-muc-tin-tuc/'.$item['slug'];
            $url->appendChild($loc);

            $lastmod = $doc->createElement('lastmod');
            $date = date('Y-m-d\TH:i:s').'+00:00';
            $lastmod->nodeValue = $date;
            $url->appendChild($lastmod);

            $priority = $doc->createElement('priority');
            $priority->nodeValue = '0.80';
            $url->appendChild($priority);
        }
        //////////////////////////////

        $list_news = model('PostModel')->findAll();

        foreach ($list_news as $item) {
            $url = $doc->createElement('url');
            $root->appendChild($url);

            $loc = $doc->createElement('loc');
            $loc->nodeValue = $domain.'/tin-tuc/'.$item['slug'];
            $url->appendChild($loc);

            $lastmod = $doc->createElement('lastmod');
            $date = date('Y-m-d\TH:i:s').'+00:00';
            $lastmod->nodeValue = $date;
            $url->appendChild($lastmod);

            $priority = $doc->createElement('priority');
            $priority->nodeValue = '0.80';
            $url->appendChild($priority);
        }
        //////////////////////////////
        $list_page = model('PageModel')->findAll();

        foreach ($list_page as $item) {
            $url = $doc->createElement('url');
            $root->appendChild($url);

            $loc = $doc->createElement('loc');
            $loc->nodeValue = $domain.'/page/'.$item['slug'];
            $url->appendChild($loc);

            $lastmod = $doc->createElement('lastmod');
            $date = date('Y-m-d\TH:i:s').'+00:00';
            $lastmod->nodeValue = $date;
            $url->appendChild($lastmod);

            $priority = $doc->createElement('priority');
            $priority->nodeValue = '0.80';
            $url->appendChild($priority);
        }
        //////////////////////////////
        $url = $doc->createElement('url');
            $root->appendChild($url);

            $loc = $doc->createElement('loc');
            $loc->nodeValue = $domain.'/sale';
            $url->appendChild($loc);

            $lastmod = $doc->createElement('lastmod');
            $date = date('Y-m-d\TH:i:s').'+00:00';
            $lastmod->nodeValue = $date;
            $url->appendChild($lastmod);

            $priority = $doc->createElement('priority');
            $priority->nodeValue = '0.80';
            $url->appendChild($priority);
        //////////////////////////////
        $url = $doc->createElement('url');
            $root->appendChild($url);

            $loc = $doc->createElement('loc');
            $loc->nodeValue = $domain.'/tat-ca-san-pham';
            $url->appendChild($loc);

            $lastmod = $doc->createElement('lastmod');
            $date = date('Y-m-d\TH:i:s').'+00:00';
            $lastmod->nodeValue = $date;
            $url->appendChild($lastmod);

            $priority = $doc->createElement('priority');
            $priority->nodeValue = '0.80';
            $url->appendChild($priority);
        //////////////////////////////
        $url = $doc->createElement('url');
            $root->appendChild($url);

            $loc = $doc->createElement('loc');
            $loc->nodeValue = $domain.'/tat-ca-tin-tuc';
            $url->appendChild($loc);

            $lastmod = $doc->createElement('lastmod');
            $date = date('Y-m-d\TH:i:s').'+00:00';
            $lastmod->nodeValue = $date;
            $url->appendChild($lastmod);

            $priority = $doc->createElement('priority');
            $priority->nodeValue = '0.80';
            $url->appendChild($priority);

        $doc->save($file);

        echo 'Tạo sitemap thanh cong';
    }
}
