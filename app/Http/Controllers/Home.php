<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class Home extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin|Staff')->only('dashboard');
    }

    public function index() : View
    {
        return view('home.index', [
            'page' => $this->getUrl(URL::current()),
            'carousel' => Anime::orderBy('date_aired', 'DESC')->take(10)->get()
        ]);
    }

    public function dashboard() {
        return view('dashboard.index', [
            'page' => $this->getUrl(URL::current())
        ]);
    }
}
