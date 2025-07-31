<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\Admin\Together;

class Contact extends BaseController
{
    public function index()
    {
        $contactModel = model('ContactModel');
        // $pages = $pageModel->findAll();
        // dd($slides);
        $data = [
            'contacts' => $contactModel->paginate(20),
            'pager' => $contactModel->pager,
        ];
        $data['menu_active'] = Together::check_url_menu();
        // dd($data);

        return view('admin/contact/list', $data);
    }

    public function delete ($id) {
        $contactModel = model('ContactModel');
        $contactModel->delete($id);
        
        return redirect()->to('admin/contacts');
    }
}
