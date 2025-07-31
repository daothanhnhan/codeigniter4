<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Controllers\Admin\Together;

class Cart extends BaseController
{
	protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
        $cartModel = model('CartModel');
        // $carts = $cartModel->findAll();
        // dd($slides);
        $data = [
            'carts' => $cartModel->paginate(20),
            'pager' => $cartModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/cart/list', $data);
    }

    public function search()
    {
        $uri = current_url(true);
        $q = $uri->getQuery(['only' => ['q']]);
        $q = str_replace("q=", "", $q);
        $q = str_replace(" ", "-", $q);
        $q = str_replace("+", "-", $q);
        $q = urldecode($q);
        // $q = vi_to_en($q);
        $q_arr = explode("-", $q);

        $cartModel = model('CartModel');
        if (count($q_arr) == 1) {
            $cartModel->like('name', $q);
            $cartModel->orLike('id', $q);
            $cartModel->orLike('phone', $q);
            $cartModel->orLike('email', $q);
        } else {
            foreach ($q_arr as $slug) {
                $cartModel->like('name', $slug);
            }
        }
        
        // dd($like);
        $cartModel->orderBy('id', 'ASC');

        
        // $carts = $cartModel->findAll();

        $data = [
            'carts' => $cartModel->paginate(20),
            'pager' => $cartModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/cart/list', $data);
    }

    public function edit ($id) {
        // dd(session('user')['id']);
        $configModel = model('ConfigModel');
        $config = $configModel->where('id', 1)->first();
        $cartModel = model('CartModel');
        $cart = $cartModel->find($id);
        $cartItemModel = model('CartItemModel');
        $cartItems = $cartItemModel->where('cart_id', $cart['id'])->findAll();
        $productModel = model('ProductModel');

        $data = [
            'config' => $config,
            'cart' => $cart,
            'cartItems' => $cartItems,
            'productModel' => $productModel,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return view('admin/cart/edit', $data);
    }

    public function update ($id) {
        $myTime = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
        $now = $myTime->toDateTimeString();

        $data_update = [
            'note' => $this->request->getPost()['note'],
            'state' => $this->request->getPost()['state'],
            'updated_at' => $now,
        ];
        $cartModel = model('CartModel');
        $cartModel->update($id, $data_update);

        $errors = ['Cập nhập thành công'];
        session()->setFlashdata('errors', $errors);
        
        $configModel = model('ConfigModel');
        $config = $configModel->where('id', 1)->first();
        $cartModel = model('CartModel');
        $cart = $cartModel->find($id);
        $cartItemModel = model('CartItemModel');
        $cartItems = $cartItemModel->where('cart_id', $cart['id'])->findAll();
        $productModel = model('ProductModel');

        $data = [
            'config' => $config,
            'cart' => $cart,
            'cartItems' => $cartItems,
            'productModel' => $productModel,
        ];
        $data['menu_active'] = Together::check_url_menu();

        return view('admin/cart/edit', $data);
    }

    public function delete ($id) {
        $cartModel = model('CartModel');
        $cartModel->delete($id);
        
        return redirect()->to('admin/carts');
    }
}
