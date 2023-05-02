<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class HomeUser extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($username) : View
    {
        return view('home.user.details', [
            'page' => $this->getUrl(URL::current()),
            'user' => User::where('username', $username)->first()
        ]);
    }
}
