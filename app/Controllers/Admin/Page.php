<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Controllers\Admin\Together;

class Page extends BaseController
{
	protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
    	$pageModel = model('PageModel');
        // $pages = $pageModel->findAll();
        // dd($slides);
        $data = [
            'pages' => $pageModel->paginate(20),
            'pager' => $pageModel->pager,
            'menu_active' => Together::check_url_menu(),
        ];
        // dd($data);

        return view('admin/page/list', $data);
    }

    public function new()
    {
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/page/new', $data);
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
                return view('admin/page/new', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/page/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/page', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }
        
        $title = $this->request->getPost()['title'];
        $slug = vi_to_en($title);
        // dd($slug);

        $slug = Together::slug_add('PageModel', $slug);
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
            'creator_id' => $_SESSION['user']['id'],
        ];
        $pageModel = model('PageModel');
        $pageModel->insert($data_insert);

        //------
        $page_id = $pageModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/page/edit/'.$page_id);
    }

    public function edit ($id) {
        // dd(session('user')['id']);
        $pageModel = model('PageModel');
        $page = $pageModel->find($id);

        if ($page['state'] == 0) {
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
            'page' => $page,
            'checkbox' => $checkbox,
            'menu_active' => Together::check_url_menu(),
        ];

        return view('admin/page/edit', $data);
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
            
                $data = $this->validator->getErrors();
                // dd($data);

                session()->setFlashdata('errors', $data);

                $data = $this->get_page_id($id);
                return view('admin/page/edit', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/page/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/page', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }
        
        $title = $this->request->getPost()['title'];
        $slug = vi_to_en($title);
        // dd($slug);

        // $together = new Together();
        $slug = Together::slug_edit('PageModel', $slug, $id);
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
            ];
        }
        
        $pageModel = model('PageModel');
        $pageModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_page_id($id);
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/page/edit', $data);
        // $this->edit($id);
    }

    public function delete ($id) {
        $pageModel = model('PageModel');
        $pageModel->delete($id);
        
        return redirect()->to('admin/pages');
    }

    public function get_page_id ($id) {
        $pageModel = model('PageModel');
        $page = $pageModel->find($id);

        if ($page['state'] == 0) {
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
            'page' => $page,
            'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function slug_add ($slug) {
        $pageModel = model('PageModel');

        $page = $pageModel->where('slug', $slug)->first();

        if (empty($page)) {
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
        $pageModel = model('PageModel');

        // kiểm tra xem slug có thay đổi hay không.
        // kiểm tra slug trong db và trong đầu vào.
        $page_id = $pageModel->where('id', $id)->first();
        // dd($page_id['slug']);
        if ($page_id['slug'] == $slug) {
            return $slug;
        }

        // kiểm tra xem có bị trùng hay không.
        $page_slug = $pageModel->where('slug', $slug)->first();

        if (empty($page_slug)) {
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
