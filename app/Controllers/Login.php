<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    /**
     * show the login form
     *
     * @return mixed
     */
    public function index()
    {
        //destroy the session when the user goes back w/o logout
        session()->destroy();
        helper("form");
        return view('login');
    }

    /**
     * authenticate the user
     * redirect to their respective UI
     *
     * @return mixed
     */
    public function auth()
    {
        helper("form");
        if (!$this->validate('loginRules')) {
            $validation = [
                'validation' => $this->validator
            ];

            return view('login', $validation);
        }

        session()->set('isLoggedIn', true);
        $role = session()->get('role');

        switch ($role) {
            case 1:
                return redirect()->to('a/dashboard');
                break;
            case 2:
                return redirect()->to('f/home');
                break;
            case 3:
                return redirect()->to('home');
                break;    
        }
    }
}
