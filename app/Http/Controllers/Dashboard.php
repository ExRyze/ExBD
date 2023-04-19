<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        return view('dashboard.index', [
            'page' => $this->getUrl(URL::current())
        ]);
    }
}
