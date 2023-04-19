<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Login extends Controller
{    
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('noauth');
    }

    public function index() : View
    {
        return $this->showLoginForm();
    }

    public function authLogin(Request $request): RedirectResponse
    {
        return $this->login($request);
    }
}
