<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UserStoreRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Auth extends Controller
{    
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('noauth')->except(['authLogout']);
    }

    public function viewRegister() : View
    {
        return view('auth.register', ['page' => 'Register']);
    }

    public function authRegister(UserStoreRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect('/login')->with('success', 'New User Data Added, Please Login...');
    }

    public function viewLogin() : View
    {
        return $this->showLoginForm();
    }

    public function authLogin(Request $request): RedirectResponse
    {
        return $this->login($request);
    }

    public function authLogout(Request $request) : RedirectResponse
    {
        return $this->logout($request);
    }
}
