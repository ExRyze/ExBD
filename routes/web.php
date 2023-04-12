<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/register', function () {
    return view('auth.register', [
        'page' => 'Register'
    ]);
});
Route::get('/login', function () {
    return view('auth.login', [
        'page' => 'Login'
    ]);
});

Route::controller(Dashboard::class)->group(function() {
    Route::get('/dashboard', 'index');
    Route::get('/dashboard/user', 'user');
});