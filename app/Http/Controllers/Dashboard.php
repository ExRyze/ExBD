<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Dashboard extends Controller
{
    public function index() {
        return view('staff.dashboard', [
            'page' => $this->getUrl(URL::current())
        ]);
    }
    
    public function user() {
        return view('staff.user', [
            'page' => $this->getUrl(URL::current()),
            'table' => User::all()
        ]);
    }
}