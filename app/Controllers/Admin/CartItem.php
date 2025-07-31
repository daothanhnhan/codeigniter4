<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CartItem extends BaseController
{
	protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];

    public function index()
    {
        //
    }

    public function edit($id)
    {
        $qty = $this->request->getGet()['qty'];
        $data_add = [
        	'product_total' => $qty,
        ];
        $cartItemModel = model('CartItemModel');
        if ($qty >= 0) {
			$cartItemModel->update($id, $data_add);
        }

        $cartItem = $cartItemModel->where('id', $id)->first();

        $cartItems = $cartItemModel->where('cart_id', $cartItem['cart_id'])->findAll();
        $productModel = model('ProductModel');

        $data = [
        	'cartItems' => $cartItems,
        	'productModel' => $productModel,
        ];

        return view('admin/cart/list_cart_item', $data);
    }

    public function editTotal($id)
    {
        $cartItemModel = model('CartItemModel');

        $cartItem = $cartItemModel->where('id', $id)->first();

        $cartItems = $cartItemModel->where('cart_id', $cartItem['cart_id'])->findAll();
        $total = 0;
        foreach ($cartItems as $item) {
        	$total += $item['product_price']*$item['product_total'];
        }

        $data = [
        	'total' => $total,
        ];

        return view('admin/cart/list_cart_item_total', $data);
    }
}
