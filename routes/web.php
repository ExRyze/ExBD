<?php

use App\Http\Controllers\Auth;
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

Route::controller(Auth::class)->group(function() {
    Route::get('/login', 'viewLogin')->name('login');
    Route::post('/login', 'authLogin');
    Route::get('/register', 'viewRegister')->name('register');
    Route::post('/register', 'authRegister');
    Route::get('/logout', 'authLogout')->name('logout');
});

Route::get('/', function() {return redirect('/dashboard');})->name('home');

Route::controller(Dashboard::class)->group(function() {
    Route::get('/dashboard', 'index')->name('dashboard');
})->middleware(['auth', 'role:user']);

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