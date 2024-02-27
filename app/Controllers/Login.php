<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('global/login');
    }

    public function forgotPassword()
    {
        return view('global/forgot_password');
    }
}
