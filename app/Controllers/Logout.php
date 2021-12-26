<?php

namespace App\Controllers;

class Logout extends BaseController
{
    /**
     * destroy session
     *
     * @return mixed
     */
    public function index()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
