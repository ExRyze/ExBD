<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardAnime;
use App\Http\Controllers\DashboardUser;
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
});

Route::controller(DashboardUser::class)->group(function() {
    Route::get('/dashboard/user', 'index');
    Route::get('/dashboard/user/create', 'create');
    Route::post('/dashboard/user/store', 'store');
    Route::get('/dashboard/user/edit/{username}', 'edit');
    Route::post('/dashboard/user/update/{id}', 'update');
    Route::get('/dashboard/user/delete/{username}', 'delete');
});
Route::get('/dashboard/user/edit', function() {return back();});
Route::post('/dashboard/user/update', function() {return back();});
Route::get('/dashboard/user/delete', function() {return back();});


Route::controller(DashboardAnime::class)->group(function() {
    Route::get('/dashboard/anime', 'index');
    Route::get('/dashboard/anime/create', 'create');
    Route::post('/dashboard/anime/store', 'store');
    Route::get('/dashboard/anime/edit/{slug}', 'edit');
    Route::post('/dashboard/anime/update/{id}', 'update');
    Route::get('/dashboard/anime/delete/{slug}', 'delete');
});
Route::get('/dashboard/anime/edit', function() {return back();});
Route::post('/dashboard/anime/update', function() {return back();});
Route::get('/dashboard/anime/delete', function() {return back();});