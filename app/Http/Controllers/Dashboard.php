<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

class Dashboard extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'page' => $this->getUrl(URL::current())
        ]);
    }
}
