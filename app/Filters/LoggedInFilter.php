<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
// use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;

class LoggedInFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $auth = service('auth');
        // $auth = new ShieldLogin;

        if (auth()->loggedIn()) {
            // echo 'da dang nhap';
            $users = auth()->getProvider();
            $user = $users->findById($_SESSION['user']['id']);
            $_SESSION['user_name'] = $user->toArray()['username'];
        } else {
            // echo 'chua dang nhap';
            return redirect()->to(site_url('admin/login'));
        }

        // if (! $auth->loggedIn()) {
        //     echo 'chua login';
        //     // return redirect()->to(site_url('admin/login'));
        // } else {
        //     echo 'da login';
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}