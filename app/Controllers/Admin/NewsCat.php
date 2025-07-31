<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Controllers\Admin\Together;

class NewsCat extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
    	// $newsCatModel = model('NewsCatModel');
     //    $newsCats = $newsCatModel->findAll();
     //    // dd($slides);
     //    $data = [
     //        'newsCats' => $newsCats,
     //        // 'pager' => $newsCatModel->pager,
     //    ];
        // dd($data);
        $data['menu_active'] = Together::check_url_menu();

        return view('admin/newsCat/list', $data);
    }

    public function new()
    {
    	// $newsCatModel = model('NewsCatModel');
    	// $newsCats_level_1 = $newsCatModel->where('parent_id', 0)->findAll();

    	// $data = [
    	// 	'empty' => 0,
    	// ];
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/newsCat/new', $data);
    }

    public function create()
    {
        $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[image,100]',
                    // 'max_dims[image,1024,768]',
                ],
            ],
        ];

        $img = $this->request->getFile('image');
        if (!empty($img->getName())) {
            if (! $this->validateData([], $validationRule)) {
            
                $error = $this->validator->getErrors();
                // dd($data);

                session()->setFlashdata('errors', $error);

                $data['menu_active'] = Together::check_url_menu();
                return view('admin/newsCat/new', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/newscat/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/newscat', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }
        
        $title = $this->request->getPost()['title'];
        $slug = vi_to_en($title);
        // dd($slug);

        $slug = $this->slug_add($slug);
        // dd(now());
        $myTime = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
        $now = $myTime->toDateTimeString();

        // dd($myTime->toDateTimeString());

        if (isset($this->request->getPost()['state'])) {
            $state = 1;
        } else {
            $state = 0;
        }

        $data_insert = [
            'image' => $img_name_new,
            'title' => $title,
            'slug' => $slug,
            'description' => $this->request->getPost()['description'],
            'content' => $this->request->getPost()['content'],
            'title_seo' => $this->request->getPost()['title_seo'],
            'des_seo' => $this->request->getPost()['des_seo'],
            'keyword' => $this->request->getPost()['keyword'],
            'state' => $state,
            'created_at' => $now,
            'updated_at' => $now,
            'creator_id' => session('user')['id'],
            'parent_id' => $this->request->getPost()['parent_id'],
            'sort' => $this->request->getPost()['sort'],
        ];
        $newsCatModel = model('NewsCatModel');
        $newsCatModel->insert($data_insert);

        //------
        $newsCat_id = $newsCatModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/newscat/edit/'.$newsCat_id);
    }

    public function edit ($id) {
        // dd(session('user')['id']);
        $newsCatModel = model('NewsCatModel');
        $newsCat = $newsCatModel->find($id);

        if ($newsCat['state'] == 0) {
            $state = false;
        } else {
            $state = true;
        }

        $checkbox = [
            'name'    => 'state',
            'class'      => 'form-check-input',
            'value'   => '1',
            'checked' => $state,
            // 'style'   => 'margin:10px',
        ];

        $data = [
            'newsCat' => $newsCat,
            'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return view('admin/newsCat/edit', $data);
    }

    public function update ($id) {
        $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[image,100]',
                    // 'max_dims[image,1024,768]',
                ],
            ],
        ];

        $img = $this->request->getFile('image');
        if (!empty($img->getName())) {
            if (! $this->validateData([], $validationRule)) {
            
                $error = $this->validator->getErrors();
                // dd($data);

                session()->setFlashdata('errors', $error);

                $data = $this->get_newsCat_id($id);
                return view('admin/newsCat/edit', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/newscat/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/newscat', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }
        
        $title = $this->request->getPost()['title'];
        $slug = vi_to_en($title);
        // dd($slug);

        $slug = $this->slug_edit($slug, $id);
        // dd(now());
        $myTime = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
        $now = $myTime->toDateTimeString();

        // dd($now);

        if (isset($this->request->getPost()['state'])) {
            $state = 1;
        } else {
            $state = 0;
        }

        if (empty($img_name_new)) {
            $data_update = [
                'title' => $title,
                'slug' => $slug,
                'description' => $this->request->getPost()['description'],
                'content' => $this->request->getPost()['content'],
                'title_seo' => $this->request->getPost()['title_seo'],
                'des_seo' => $this->request->getPost()['des_seo'],
                'keyword' => $this->request->getPost()['keyword'],
                'state' => $state,
                'updated_at' => $now,
                'parent_id' => $this->request->getPost()['parent_id'],
                'sort' => $this->request->getPost()['sort'],
            ];
        } else {
            $data_update = [
                'image' => $img_name_new,
                'title' => $title,
                'slug' => $slug,
                'description' => $this->request->getPost()['description'],
                'content' => $this->request->getPost()['content'],
                'title_seo' => $this->request->getPost()['title_seo'],
                'des_seo' => $this->request->getPost()['des_seo'],
                'keyword' => $this->request->getPost()['keyword'],
                'state' => $state,
                'updated_at' => $now,
                'parent_id' => $this->request->getPost()['parent_id'],
                'sort' => $this->request->getPost()['sort'],
            ];
        }
        
        $newsCatModel = model('NewsCatModel');
        $newsCatModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_newsCat_id($id);
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/newsCat/edit', $data);
        // $this->edit($id);
    }

    public function delete ($id) {
        $newsCatModel = model('NewsCatModel');
        $newsCatModel->delete($id);
        
        return redirect()->to('admin/newscats');
    }

    public function get_newsCat_id ($id) {
        $newsCatModel = model('NewsCatModel');
        $newsCat = $newsCatModel->find($id);

        if ($newsCat['state'] == 0) {
            $state = false;
        } else {
            $state = true;
        }

        $checkbox = [
            'name'    => 'state',
            'class'      => 'form-check-input',
            'value'   => '1',
            'checked' => $state,
            // 'style'   => 'margin:10px',
        ];

        $data = [
            'newsCat' => $newsCat,
            'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function slug_add ($slug) {
        $newsCatModel = model('NewsCatModel');

        $newsCat = $newsCatModel->where('slug', $slug)->first();

        if (empty($newsCat)) {
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

    public function slug_edit ($slug, $id) {
        $newsCatModel = model('NewsCatModel');

        // kiểm tra xem slug có thay đổi hay không.
        // kiểm tra slug trong db và trong đầu vào.
        $newsCat_id = $newsCatModel->where('id', $id)->first();
        // dd($page_id['slug']);
        if ($newsCat_id['slug'] == $slug) {
            return $slug;
        }

        // kiểm tra xem có bị trùng hay không.
        $newsCat_slug = $newsCatModel->where('slug', $slug)->first();

        if (empty($newsCat_slug)) {
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
}
