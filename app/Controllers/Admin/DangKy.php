<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Traits\Viewable;
use CodeIgniter\Shield\Validation\ValidationRules;
use Psr\Log\LoggerInterface;
use App\Controllers\Admin\Together;

/**
 * Class RegisterController
 *
 * Handles displaying registration form,
 * and handling actual registration flow.
 */
class DangKy extends BaseController
{
    use Viewable;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ): void {
        parent::initController(
            $request,
            $response,
            $logger
        );
    }

    /**
     * Displays the registration form.
     *
     * @return RedirectResponse|string
     */
    public function registerView()
    {
        // if (auth()->loggedIn()) {
        //     return redirect()->to(config('Auth')->registerRedirect());
        // }

        // Check if registration is allowed
        // if (! setting('Auth.allowRegistration')) {
        //     return redirect()->back()->withInput()
        //         ->with('error', lang('Auth.registerDisabled'));
        // }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            // return redirect()->route('auth-action-show');
        }

        // return $this->view('admin/user/create');
    }

    /**
     * Attempts to register the user.
     */
    public function registerAction(): RedirectResponse
    {
        // if (auth()->loggedIn()) {
        //     return redirect()->to(config('Auth')->registerRedirect());
        // }

        // Check if registration is allowed
        // if (! setting('Auth.allowRegistration')) {
        //     return redirect()->back()->withInput()
        //         ->with('error', lang('Auth.registerDisabled'));
        // }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (! $this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_keys($rules);
        $user              = $this->getUserEntity();
        $user->fill($this->request->getPost($allowedPostFields));

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        // Events::trigger('register', $user);

        /** @var Session $authenticator */
        // $authenticator = auth('session')->getAuthenticator();

        // $authenticator->startLogin($user);

        // If an action has been defined for register, start it up.
        // $hasAction = $authenticator->startUpAction('register', $user);
        // if ($hasAction) {
        //     return redirect()->route('auth-action-show');
        // }

        // Set the user active
        $user->activate();

        // $authenticator->completeLogin($user);

        // Success!
        // return redirect()->to(config('Auth')->registerRedirect())
        //     ->with('message', lang('Auth.registerSuccess'));

        return redirect()->to('admin/users');
    }

    public function editUser (int $id) 
    {
        $users = auth()->getProvider();
        $user = $users->findById($id);
        $user_main = $users->findById($id)->toArray();
        // dd($users);
        // dd($user->getIdentity('all'));
        $user_identity = $user->getIdentity('all')->toArray();
        $data = [
            'username' => $user_main['username'],
            'email' => $user_identity['secret'],
            'id' => $user_main['id'],
        ];
        $data['menu_active'] = Together::check_url_menu();
        return $this->view('admin/user/update', $data);
    }

    public function updateUser (int $id) 
    {
        // dd($this->request->getPost());

        $errors = [
            'username' => [
                    'required' => 'Username là yêu cầu',
                    'is_unique' => 'Username là duy nhất',
                ],
            'email' => [
                    'required' => 'Email là yêu cầu',
                    'is_unique' => 'Email là duy nhất',
                    'valid_email' => 'Email phải đúng dạng',
                ],
            'password_confirm' => [
                    'matches' => 'password_confirm phải khớp với password',
            ],
        ];

        if (empty($this->request->getPost()['password'])) {
            $rules = [
                // 'username' => "required|is_unique[users.username]",
                'username' => "required|is_unique[users.username,id,{$id}]",
                'email'  => "valid_email|required|is_unique[auth_identities.secret,user_id,{$id}]",
            ];
        } else {
            $rules = [
                'username' => "required|is_unique[users.username,id,{$id}]",
                'email'  => "valid_email|required|is_unique[auth_identities.secret,user_id,{$id}]",
                'password'  => "strong_password[]",
                'password_confirm'  => "matches[password]",
            ];
        }

        if (! $this->validate($rules, $errors)) {
            // The validation failed.
            $loi_vn = $this->validator->getErrors();
            // dd($loi_vn);
            if ($loi_vn['password'] == 'Passwords must be at least 8 characters long.') {
                $loi_vn['password'] = 'Passwords phải có ít nhất 8 ký tự';
            }
            if ($loi_vn['password'] == 'Password must not be a common password.') {
                $loi_vn['password'] = 'Passwords phải không phổ biến';
            }
            if ($loi_vn['password'] == 'Passwords cannot contain re-hashed personal information.') {
                $loi_vn['password'] = 'Passwords phải không chứ thông tin cá nhân';
            }
            if ($loi_vn['password'] == 'Password is too similar to the username.') {
                $loi_vn['password'] = 'Passwords phải không giống username';
            }
            session()->setFlashdata('errors', $loi_vn);
        } else {
            $post = $this->validator->getValidated();

            $users = auth()->getProvider();

            $user = $users->findById($id);

            if (isset($post['password'])) {
                // dd('đổi mật khẩu');
                $user->fill([
                    'username' => $post['username'],
                    'email' => $post['email'],
                    'password' => $post['password']
                ]);
            } else {
                // dd('không đổi mật khẩu');
                $user->fill([
                    'username' => $post['username'],
                    'email' => $post['email'],
                    // 'password' => 'secret123'
                ]);
            }
            
            $users->save($user);
        }

        $users = auth()->getProvider();
        $user = $users->findById($id);
        $user_main = $users->findById($id)->toArray();
        // dd($user);
        $user_identity = $user->getIdentity('all')->toArray();
        $data = [
            'username' => $user_main['username'],
            'email' => $user_identity['secret'],
            'id' => $user_main['id'],
        ];
        $data['menu_active'] = Together::check_url_menu();
        return $this->view('admin/user/update', $data);
    }

    /**
     * Returns the User provider
     */
    protected function getUserProvider(): UserModel
    {
        $provider = model(setting('Auth.userProvider'));

        assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

        return $provider;
    }

    /**
     * Returns the Entity class that should be used
     */
    protected function getUserEntity(): User
    {
        return new User();
    }

    /**
     * Returns the rules that should be used for validation.
     *
     * @return array<string, array<string, list<string>|string>>
     */
    protected function getValidationRules(): array
    {
        $rules = new ValidationRules();

        return $rules->getRegistrationRules();
    }
}
