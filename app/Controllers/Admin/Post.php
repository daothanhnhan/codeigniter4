<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Controllers\Admin\Together;

class Post extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
    	$postModel = model('PostModel');
        // $newsCats = $newsCatModel->findAll();
        // dd($slides);
        $data = [
            'posts' => $postModel->paginate(20),
            'pager' => $postModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/post/list', $data);
    }

    public function search()
    {
        $uri = current_url(true);
        $q = $uri->getQuery(['only' => ['q']]);
        $q = str_replace("q=", "", $q);
        $q = str_replace(" ", "-", $q);
        $q = str_replace("+", "-", $q);
        $q = urldecode($q);
        $q = vi_to_en($q);
        $q_arr = explode("-", $q);

        $postModel = model('PostModel');
        foreach ($q_arr as $slug) {
            $postModel->like('slug', $slug);
        }
        // dd($like);
        $postModel->orderBy('id', 'ASC');
        
        // $newsCats = $newsCatModel->findAll();
        // dd($slides);
        $data = [
            'posts' => $postModel->paginate(20),
            'pager' => $postModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/post/list', $data);
    }

    public function new()
    {
    	// $newsCatModel = model('NewsCatModel');
    	// $newsCats_level_1 = $newsCatModel->where('parent_id', 0)->findAll();

    	// $data = [
    	// 	'empty' => 0,
    	// ];
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/post/new', $data);
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
                return view('admin/post/new', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/post/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/post', $img_name_new);
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

        $newscat_id = '';
        if (isset($this->request->getPost()['newscat_id'])) {
            $newscat_id = json_encode($this->request->getPost()['newscat_id']);
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
            'newscat_id' => $newscat_id,
            'sort' => $this->request->getPost()['sort'],
        ];
        $postModel = model('PostModel');
        $postModel->insert($data_insert);

        //------
        $post_id = $postModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/post/edit/'.$post_id);
    }

    public function edit ($id) {
        // dd(session('user')['id']);
        $postModel = model('PostModel');
        $post = $postModel->find($id);

        // $newscat_id = json_decode($post['newscat_id']);
        // dd($newscat_id);

        if ($post['state'] == 0) {
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
            'post' => $post,
            'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return view('admin/post/edit', $data);
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

                $data = $this->get_post_id($id);
                return view('admin/post/edit', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/post/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/post', $img_name_new);
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

        $newscat_id = '';
        if (isset($this->request->getPost()['newscat_id'])) {
            $newscat_id = json_encode($this->request->getPost()['newscat_id']);
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
                'newscat_id' => $newscat_id,
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
                'newscat_id' => $newscat_id,
                'sort' => $this->request->getPost()['sort'],
            ];
        }
        
        $postModel = model('PostModel');
        $postModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_post_id($id);
        return view('admin/post/edit', $data);
        // $this->edit($id);
    }

    public function delete ($id) {
        $postModel = model('PostModel');
        $postModel->delete($id);
        
        return redirect()->to('admin/posts');
    }

    public function get_post_id ($id) {
        $postModel = model('PostModel');
        $post = $postModel->find($id);

        if ($post['state'] == 0) {
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
            'post' => $post,
            'checkbox' => $checkbox,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function slug_add ($slug) {
        $postModel = model('PostModel');

        $post = $postModel->where('slug', $slug)->first();

        if (empty($post)) {
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
        $postModel = model('PostModel');

        // kiểm tra xem slug có thay đổi hay không.
        // kiểm tra slug trong db và trong đầu vào.
        $post_id = $postModel->where('id', $id)->first();
        // dd($page_id['slug']);
        if ($post_id['slug'] == $slug) {
            return $slug;
        }

        // kiểm tra xem có bị trùng hay không.
        $post_slug = $postModel->where('slug', $slug)->first();

        if (empty($post_slug)) {
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
