<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Controllers\Admin\Together;

class Product extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
    	$productModel = model('ProductModel');
        // $newsCats = $newsCatModel->findAll();
        // dd($slides);
        $data = [
            'products' => $productModel->paginate(20),
            'pager' => $productModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/product/list', $data);
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

        $productModel = model('ProductModel');
        foreach ($q_arr as $slug) {
            $productModel->like('slug', $slug);
        }
        $productModel->orderBy('id', 'ASC');
        
        // $newsCats = $newsCatModel->findAll();
        // dd($slides);
        $data = [
            'products' => $productModel->paginate(20),
            'pager' => $productModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/product/list', $data);
    }

    public function new()
    {

        $data['menu_active'] = Together::check_url_menu();
        return view('admin/product/new', $data);
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
                return view('admin/product/new', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/product/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/product', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }

        // start upload image sub
        $img_subs = $this->request->getFiles()['image_sub'];

        $img_name_new_sub = [];

        foreach ($img_subs as $img_sub) {
            if (empty($img_sub->getName())) {
                continue;
            }
            $img_name_tmp = remove_extension_file($img_sub->getName());
            $extension_tmp = $img_sub->getExtension();

            $img_name_en_tmp = vi_to_en($img_name_tmp);

            $img_name_new_tmp = $img_name_en_tmp.'.'.$extension_tmp;

            $path = 'uploads/product/' . $img_name_new_tmp;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img_sub->move('uploads/product', $img_name_new_tmp);
            }
            $img_name_new_sub[] = $img_name_new_tmp;
        }

        $img_name_new_sub = json_encode($img_name_new_sub);

        // dd($img_name_new_sub);
        // end upload image sub
        
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

        if (isset($this->request->getPost()['product_new'])) {
            $product_new = 1;
        } else {
            $product_new = 0;
        }

        if (isset($this->request->getPost()['product_hot'])) {
            $product_hot = 1;
        } else {
            $product_hot = 0;
        }

        $productcat_id = '';
        if (isset($this->request->getPost()['productcat_id'])) {
            $productcat_id = json_encode($this->request->getPost()['productcat_id']);
        }
        

        /////////
        $price = $this->clear_price($this->request->getPost()['price']);
        $price_sale = $this->clear_price($this->request->getPost()['price_sale']);

        $data_insert = [
            'image' => $img_name_new,
            'image_sub' => $img_name_new_sub,
            'title' => $title,
            'slug' => $slug,
            'description' => $this->request->getPost()['description'],
            'content' => $this->request->getPost()['content'],
            'title_seo' => $this->request->getPost()['title_seo'],
            'des_seo' => $this->request->getPost()['des_seo'],
            'keyword' => $this->request->getPost()['keyword'],
            'state' => $state,
            'product_new' => $product_new,
            'product_hot' => $product_hot,
            'created_at' => $now,
            'updated_at' => $now,
            'creator_id' => session('user')['id'],
            'productcat_id' => $productcat_id,
            'sort' => $this->request->getPost()['sort'],

            'price' => $price,
            'price_sale' => $price_sale,
            'product_code' => $this->request->getPost()['product_code'],
            'product_shape' => $this->request->getPost()['product_shape'],
            'product_size' => $this->request->getPost()['product_size'],
            'product_brand' => $this->request->getPost()['product_brand'],
            'product_origin' => $this->request->getPost()['product_origin'],
            'product_text_1' => $this->request->getPost()['product_text_1'],
        ];
        $productModel = model('ProductModel');
        $productModel->insert($data_insert);

        //------
        $product_id = $productModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/product/edit/'.$product_id);
    }

    public function edit ($id) {
        // $productModel = model('ProductModel');
        // $product = $productModel->find($id);

        // if ($product['state'] == 0) {
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
        //     'product' => $product,
        //     'checkbox' => $checkbox,
        // ];

        $data = $this->get_product_id($id);

        return view('admin/product/edit', $data);
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

                $data = $this->get_product_id($id);
                return view('admin/product/edit', $data);
            }

            $img = $this->request->getFile('image');
            // pathinfo
            $img_name = remove_extension_file($img->getName());
            $extension = $img->getExtension();

            $img_name_en = vi_to_en($img_name);

            $img_name_new = $img_name_en.'.'.$extension;

            $path = 'uploads/product/' . $img_name_new;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img->move('uploads/product', $img_name_new);
            } else {
                // đã có file upload
            }
        } else {
            $img_name_new = '';
        }

        // start upload image sub
        $img_subs = $this->request->getFiles()['image_sub'];

        // dd($img_subs);

        $img_name_new_sub = [];
        if (!empty($this->request->getPost()['image_sub_old'])) {
            $img_name_new_sub = $this->request->getPost()['image_sub_old'];
        }

        foreach ($img_subs as $img_sub) {
            if (empty($img_sub->getName())) {
                continue;
            }
            $img_name_tmp = remove_extension_file($img_sub->getName());
            $extension_tmp = $img_sub->getExtension();

            $img_name_en_tmp = vi_to_en($img_name_tmp);

            $img_name_new_tmp = $img_name_en_tmp.'.'.$extension_tmp;

            $path = 'uploads/product/' . $img_name_new_tmp;

            $file = new \CodeIgniter\Files\File($path);

            if (! $file->getRealPath()) {
                // chưa có file upload
                $filepath_bool = $img_sub->move('uploads/product', $img_name_new_tmp);
            }
            $img_name_new_sub[] = $img_name_new_tmp;
        }

        $img_name_new_sub = json_encode($img_name_new_sub);

        // dd($img_name_new_sub);
        // end upload image sub
        
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

        if (isset($this->request->getPost()['product_new'])) {
            $product_new = 1;
        } else {
            $product_new = 0;
        }

        if (isset($this->request->getPost()['product_hot'])) {
            $product_hot = 1;
        } else {
            $product_hot = 0;
        }

        $productcat_id = '';
        if (isset($this->request->getPost()['productcat_id'])) {
            $productcat_id = json_encode($this->request->getPost()['productcat_id']);
        }
        

        /////////
        $price = $this->clear_price($this->request->getPost()['price']);
        $price_sale = $this->clear_price($this->request->getPost()['price_sale']);

        $data_update = [
            'image_sub' => $img_name_new_sub,
            'title' => $title,
            'slug' => $slug,
            'description' => $this->request->getPost()['description'],
            'content' => $this->request->getPost()['content'],
            'title_seo' => $this->request->getPost()['title_seo'],
            'des_seo' => $this->request->getPost()['des_seo'],
            'keyword' => $this->request->getPost()['keyword'],
            'state' => $state,
            'product_new' => $product_new,
            'product_hot' => $product_hot,
            'updated_at' => $now,
            'productcat_id' => $productcat_id,
            'sort' => $this->request->getPost()['sort'],

            'price' => $price,
            'price_sale' => $price_sale,
            'product_code' => $this->request->getPost()['product_code'],
            'product_shape' => $this->request->getPost()['product_shape'],
            'product_size' => $this->request->getPost()['product_size'],
            'product_brand' => $this->request->getPost()['product_brand'],
            'product_origin' => $this->request->getPost()['product_origin'],
            'product_text_1' => $this->request->getPost()['product_text_1'],
        ];

        if (empty($img_name_new)) {
            
        } else {
            $data_update['image'] = $img_name_new;
        }
        
        $productModel = model('ProductModel');
        $productModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $data = $this->get_product_id($id);
        return view('admin/product/edit', $data);
        // $this->edit($id);
    }

    public function copy($id)
    {
        $product_base = model('ProductModel')->where('id', $id)->first();
        
        $title = $product_base['title'];
        $slug = vi_to_en($title);
        $slug = $this->slug_add($slug);
        // dd(now());
        $myTime = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
        $now = $myTime->toDateTimeString();
        /////////

        $data_insert = [
            'image' => $product_base['image'],
            'image_sub' => $product_base['image_sub'],
            'title' => $product_base['title'],
            'slug' => $slug,
            'description' => $product_base['description'],
            'content' => $product_base['content'],
            'title_seo' => $product_base['title_seo'],
            'des_seo' => $product_base['des_seo'],
            'keyword' => $product_base['keyword'],
            'state' => $product_base['state'],
            'product_new' => $product_base['product_new'],
            'product_hot' => $product_base['product_hot'],
            'created_at' => $now,
            'updated_at' => $now,
            'creator_id' => session('user')['id'],
            'productcat_id' => $product_base['productcat_id'],
            'sort' => $product_base['sort'],

            'price' => $product_base['price'],
            'price_sale' => $product_base['price_sale'],
            'product_code' => $product_base['product_code'],
            'product_shape' => $product_base['product_shape'],
            'product_size' => $product_base['product_size'],
            'product_brand' => $product_base['product_brand'],
            'product_origin' => $product_base['product_origin'],
            'product_text_1' => $product_base['product_text_1'],
        ];
        $productModel = model('ProductModel');
        $productModel->insert($data_insert);

        //------
        $product_id = $productModel->getInsertID();

        $errors = ['Tạo mới thành công'];
        session()->setFlashdata('errors', $errors);
        
        // return view('admin/page/edit/'.$page_id);
        return redirect()->to('admin/product/edit/'.$product_id);
    }

    public function delete ($id) {
        $productModel = model('ProductModel');
        $productModel->delete($id);
        
        return redirect()->to('admin/products');
    }

    public function get_product_id ($id) {
        $productModel = model('ProductModel');
        $product = $productModel->find($id);

        if ($product['state'] == 0) {
            $state = false;
        } else {
            $state = true;
        }

        if ($product['product_new'] == 0) {
            $product_new_state = false;
        } else {
            $product_new_state = true;
        }

        if ($product['product_hot'] == 0) {
            $product_hot_state = false;
        } else {
            $product_hot_state = true;
        }

        $checkbox = [
            'name'    => 'state',
            'class'      => 'form-check-input',
            'value'   => '1',
            'checked' => $state,
            // 'style'   => 'margin:10px',
        ];

        $checkbox_new = [
            'name'    => 'product_new',
            'class'      => 'form-check-input',
            'value'   => '1',
            'checked' => $product_new_state,
            // 'style'   => 'margin:10px',
        ];

        $checkbox_hot = [
            'name'    => 'product_hot',
            'class'      => 'form-check-input',
            'value'   => '1',
            'checked' => $product_hot_state,
            // 'style'   => 'margin:10px',
        ];

        $image_sub = json_decode($product['image_sub']);

        $data = [
            'product' => $product,
            'checkbox' => $checkbox,
            'checkbox_new' => $checkbox_new,
            'checkbox_hot' => $checkbox_hot,
            'image_sub' => $image_sub,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return $data;
    }

    public function slug_add ($slug) {
        $productModel = model('ProductModel');

        $product = $productModel->where('slug', $slug)->first();

        if (empty($product)) {
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
        $productModel = model('ProductModel');

        // kiểm tra xem slug có thay đổi hay không.
        // kiểm tra slug trong db và trong đầu vào.
        $product_id = $productModel->where('id', $id)->first();
        // dd($page_id['slug']);
        if ($product_id['slug'] == $slug) {
            return $slug;
        }

        // kiểm tra xem có bị trùng hay không.
        $product_slug = $productModel->where('slug', $slug)->first();

        if (empty($product_slug)) {
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

    public function clear_price ($price_text) {
        if (empty($price_text)) {
            $price = 0;
        } else {
            $price = str_replace(",", "", $price_text);
        }

        return $price;
    }
}
