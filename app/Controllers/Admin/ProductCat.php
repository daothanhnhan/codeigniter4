<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Controllers\Admin\Together;

class ProductCat extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/productCat/list', $data);
    }

    public function new()
    {
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/productCat/new', $data);
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
                return view('admin/productCat/new', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/productcat/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/productcat', $img_name_new);
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
        $productCatModel = model('ProductCatModel');
        $productCatModel->insert($data_insert);

        //------
        $productCat_id = $productCatModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/productcat/edit/'.$productCat_id);
    }

    public function edit ($id) {
        // dd(session('user')['id']);
        // $productCatModel = model('ProductCatModel');
        // $productCat = $productCatModel->find($id);

        // if ($productCat['state'] == 0) {
        //     $state = false;
        // } else {
        //     $state = true;
        // }

        // $checkbox = [
        //     'name'    => 'state',
        //     'class'      => 'form-check-input',
        //     'value'   => '1',
        //     'checked' => $state,
        //     // 'style'   => 'margin:10px',
        // ];

        // $data = [
        //     'productCat' => $productCat,
        //     'checkbox' => $checkbox,
        // ];

        $data = $this->get_productCat_id($id);

        return view('admin/productCat/edit', $data);
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

                $data = $this->get_productCat_id($id);
                return view('admin/productCat/edit', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/productcat/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/productcat', $img_name_new);
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
        
        $productCatModel = model('ProductCatModel');
        $productCatModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_productCat_id($id);
        return view('admin/productCat/edit', $data);
        // $this->edit($id);
    }

    public function delete ($id) {
        $productCatModel = model('ProductCatModel');
        $productCatModel->delete($id);
        
        return redirect()->to('admin/productcats');
    }

    public function get_productCat_id ($id) {
        $productCatModel = model('ProductCatModel');
        $productCat = $productCatModel->find($id);

        if ($productCat['state'] == 0) {
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
            'productCat' => $productCat,
            'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function slug_add ($slug) {
        $productCatModel = model('ProductCatModel');

        $productCat = $productCatModel->where('slug', $slug)->first();

        if (empty($productCat)) {
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
        $productCatModel = model('ProductCatModel');

        // kiểm tra xem slug có thay đổi hay không.
        // kiểm tra slug trong db và trong đầu vào.
        $productCat_id = $productCatModel->where('id', $id)->first();
        // dd($page_id['slug']);
        if ($productCat_id['slug'] == $slug) {
            return $slug;
        }

        // kiểm tra xem có bị trùng hay không.
        $productCat_slug = $productCatModel->where('slug', $slug)->first();

        if (empty($productCat_slug)) {
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
