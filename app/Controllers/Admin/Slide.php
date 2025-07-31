<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Files\File;
use App\Controllers\Admin\Together;

class Slide extends BaseController
{
	protected $helpers = ['form', 'tuan', 'filesystem', 'html'];

    public function index()
    {
        $slideModel = model('SlideModel');
        $slides = $slideModel->findAll();
        // dd($slides);
        $data = [
            'slides' => $slideModel->paginate(1000),
            'pager' => $slideModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        // $pager = service('pager');
        return view('admin/slide/list', $data);
    }

    public function new()
    {
        $data['menu_active'] = Together::check_url_menu();
        return view('admin/slide/new', $data);
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
        if (! $this->validateData([], $validationRule)) {
            // $data = ['errors' => $this->validator->getErrors()];
            $error = $this->validator->getErrors();
            // dd($data);

            session()->setFlashdata('errors', $error);

            $data['menu_active'] = Together::check_url_menu();
            return view('admin/slide/new', $data);
        }

        $img = $this->request->getFile('image');
        // pathinfo
        $img_name = remove_extension_file($img->getName());
        $extension = $img->getExtension();
        // dd($img);
        // dd($img->getExtension());
        $img_name_en = mb_url_title($img_name, '-', true);
        // dd($name_img);
        $img_name_new = $img_name_en.'.'.$extension;

        $path = 'uploads/slide/' . $img_name_new;

        // dd($img->getDestination($path));
        // dd(get_filename_similar());

        // $check = set_realpath($path, true);
        $file = new \CodeIgniter\Files\File($path);
        // dd($file->getRealPath());

        if (! $file->getRealPath()) {
            // chưa có file upload
            // $filepath = WRITEPATH . 'uploads/' . $img->store('slide/', $img_name_new);
            $filepath_bool = $img->move('uploads/slide', $img_name_new);
            // dd($filepath);
            // dd($img->getDestination($path));
            // dd(get_filename_similar());

            // $data = ['uploaded_fileinfo' => new File($filepath)];

            // session()->setFlashdata('errors', $data);

            // dd('thành công');

            // return view('admin/slide/new', $data);

        } else {
            // đã có file upload
            // dd('Thất bại');
        }

        // dd('stop');
        // return '';

        // $data = ['errors' => 'The file has already been moved.'];
        // session()->setFlashdata('errors', $data);
        // return view('admin/slide/new', $data);

        $data = [
            'image' => $img_name_new,
            'sort' => $this->request->getPost()['sort'],
        ];
        $slideModel = model('SlideModel');
        $slideModel->insert($data);

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);

        return redirect()->to('admin/slides');
    }

    public function edit ($id) {
        $slideModel = model('SlideModel');
        $slide = $slideModel->where('id', $id)->first();

        $data = [
            'slide' => $slide
        ];
        $data['menu_active'] = Together::check_url_menu();

        // dd($_SESSION['user']['id']);
        return view('admin/slide/edit', $data);
    }

    public function update ($id) {
        $validationRule = [
            'image' => [
                'label' => 'Image Slide',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[image,100]',
                    // 'max_dims[image,1024,768]',
                ],
            ],
        ];

        $slideModel = model('SlideModel');

        $img = $this->request->getFile('image');
        if (!empty($img->getName())) {
            if (! $this->validateData([], $validationRule)) {
                // $data = ['errors' => $this->validator->getErrors()];
                $errors = $this->validator->getErrors();
                // dd($data);

                session()->setFlashdata('errors', $errors);

                $slide = $slideModel->where('id', $id)->first();

                $data = [
                    'slide' => $slide
                ];
                $data['menu_active'] = Together::check_url_menu();

                return view('admin/slide/edit', $data);
            }
            // kết thúc kiểm tra tính hợp lệ
            // set tên ảnh và upload

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = pathinfo($img->getName())['filename'];
            $extension = $img->getExtension();

            $img_name_en = mb_url_title($img_name, '-', true);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/slide/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/slide', $img_name_new);

                // dd($img->getDestination($path));
                // dd(get_filename_similar());
            }
            // lưu lại
            $data = [
                'image' => $img_name_new,
                'sort' => $this->request->getPost()['sort'],
            ];

            $slideModel->update($id, $data);
        } else {
            $data = [
                'sort' => $this->request->getPost()['sort'],
            ];

            $slideModel->update($id, $data);
        }

        // show kết quả

        $slide = $slideModel->where('id', $id)->first();;

        $data = [
            'slide' => $slide
        ];
        $data['menu_active'] = Together::check_url_menu();

        $errors = ['Cập nhật thành công'];
        session()->setFlashdata('errors', $errors);

        return view('admin/slide/edit', $data);
    }

    public function delete ($id) {
        $slideModel = model('SlideModel');
        $slideModel->delete($id);
        
        return redirect()->to('admin/slides');
    }

    public function sort () {
        $id = $this->request->getGet()['id'];
        $sort = $this->request->getGet()['sort'];
        $data = [
            'sort' => $sort,
        ];
        $slideModel = model('SlideModel');
        $slideModel->update($id, $data);

        return json_encode(['thành công']);
    }
}
