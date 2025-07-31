<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\Admin\Together;

class Video extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
    	$videoModel = model('VideoModel');
        // $videos = $videoModel->findAll();
        // dd($slides);
        $data = [
            'videos' => $videoModel->paginate(20),
            'pager' => $videoModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/video/list', $data);
    }

    public function new()
    {
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/video/new', $data);
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
                return view('admin/video/new', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/video/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/video', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }

        $data_insert = [
            'image' => $img_name_new,
            'content' => $this->request->getPost()['content'],
        ];
        $videoModel = model('VideoModel');
        $videoModel->insert($data_insert);

        //------
        $video_id = $videoModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/video/edit/'.$video_id);
    }

    public function edit ($id) {
        // dd(session('user')['id']);
        $data = $this->get_video_id($id);

        return view('admin/video/edit', $data);
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

                $data = $this->get_video_id($id);
                return view('admin/video/edit', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/video/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/video', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }

        $data_update = [
            'content' => $this->request->getPost()['content'],
        ];
        
        if (!empty($img_name_new)) {
            $data_update['image'] = $img_name_new;
        }
        
        $videoModel = model('VideoModel');
        $videoModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_video_id($id);
        return view('admin/video/edit', $data);
        // $this->edit($id);
    }

    public function delete ($id) {
        $videoModel = model('VideoModel');
        $videoModel->delete($id);
        
        return redirect()->to('admin/videos');
    }

    public function get_video_id ($id) {
        $videoModel = model('VideoModel');
        $video = $videoModel->find($id);

        $data = [
            'video' => $video,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }
}
