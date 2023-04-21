<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class Home extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin')->only('dashboard');
    }
    public function index() : View
    {
        return view('index', [
            'page' => $this->getUrl(URL::current())
        ]);
    }

    public function dashboard() {
        return view('dashboard.index', [
            'page' => $this->getUrl(URL::current())
        ]);
    }
}
