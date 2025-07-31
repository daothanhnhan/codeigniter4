<?php

namespace App\Controllers\Admin;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Entities\User;
use App\Controllers\Admin\Together;

class UserAdmin extends ShieldLogin
{

    protected $helpers = ['form'];

    public function logoutAction(): RedirectResponse
    {
        // new functionality
    }

    public function listUsers() 
    {
    	// echo ' -- hello admin';

    	$user_model = auth()->getProvider();

    	// $user = $user_model->findById(1);
    	$users = $user_model->findAll();

        // $userModel = model('UserModel');
        // $users = $userModel->findAll();

        // dd($users[1]->getIdentity('all'));

        $users_tmp = [];

        foreach ($users as $user) {
            $main = $user->toArray();
            if (empty($user->getIdentity('all'))) {
                $identity = ['secret' => ''];
            } else {
                $identity = $user->getIdentity('all')->toArray();
            }

            $users_tmp[] = array('main' => $main, 'identity' => $identity);
        }

        // dd($users_tmp);


        // dd($user->toArray());
        // dd($user->getIdentity('all')->toArray());

        $data = [
            'users' => $users_tmp,
        ];
        $data['menu_active'] = Together::check_url_menu();

    	return view('admin/user/list', $data);
    }

    public function create () {
        // return view('admin/user/create');
    }

    public function store () {
        // không dùng store này
        $data = $this->request->getPost();
        // dd($data);
        if (! $this->validateData($data, [
            'username' => 'required',
            'email'  => 'required',
            'password'  => 'required',
        ])) {
            // The validation fails, so returns the form.
            // dd('validate error');
            $data['menu_active'] = Together::check_url_menu();
            return view('admin/user/create', $data);
        } else {
            // dd('validate success');
            // Gets the validated data.
            $post = $this->validator->getValidated();
            // dd($post);
            // Get the User Provider (UserModel by default)
            $users = auth()->getProvider();

            $user = new User([
                'username' => $post['username'],
                'email'    => $post['email'],
                'password' => $post['password'],
            ]);
            $users->save($user);

            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($users->getInsertID());

            // Add to default group
            $users->addToDefaultGroup($user);
            // không dùng store này
            return redirect()->to('admin/users');
        }

        
    }

    public function deleteUser ($id) {
        // Get the User Provider (UserModel by default)
        // dd($this->request->getPost());
        $users = auth()->getProvider();
        if ($id != 1) {
            $users->delete($id, true);
        }
        
        return redirect()->to('admin/users');
    }
}