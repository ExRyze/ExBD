<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardAnime;
use App\Http\Controllers\DashboardAnimeAlias;
use App\Http\Controllers\DashboardAnimeGenre;
use App\Http\Controllers\DashboardAnimeLicensor;
use App\Http\Controllers\DashboardAnimeProducer;
use App\Http\Controllers\DashboardAnimeStudio;
use App\Http\Controllers\DashboardAnimeTheme;
use App\Http\Controllers\DashboardGenre;
use App\Http\Controllers\DashboardLicensor;
use App\Http\Controllers\DashboardProducer;
use App\Http\Controllers\DashboardStudio;
use App\Http\Controllers\DashboardTheme;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeAnime;
use App\Http\Controllers\HomeSetting;
use App\Http\Controllers\HomeUser;
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
}); // Login, Register, && Logout

Route::controller(Home::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('/home', function() {return redirect('/');});
    Route::get('/dashboard', 'dashboard')->name('dashboard');
}); // Home && Dashboard

Route::controller(HomeUser::class)->group(function() {
    Route::get('/user/{username}', 'index');
}); 
Route::get('/user', function() {return back();});
    // Home/User

Route::controller(HomeSetting::class)->group(function() {
    Route::get('/setting', 'profile');
    Route::get('/setting/profile', 'profile');
    Route::post('/setting/profile/update/{id}', 'updateProfile');
}); // Home/Setting

Route::controller(HomeAnime::class)->group(function() {
    Route::get('/anime', 'index');
    Route::get('/anime/{slug}', 'details');
}); // Home/Anime

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
    // Dashboard/User
  
Route::controller(DashboardGenre::class)->group(function() {
    Route::post('/dashboard/genre/store', 'store');
});
    // Dashboard/Genre

Route::controller(DashboardTheme::class)->group(function() {
    Route::post('/dashboard/theme/store', 'store');
});
    // Dashboard/Theme

Route::controller(DashboardProducer::class)->group(function() {
    Route::post('/dashboard/producer/store', 'store');
});
    // Dashboard/Producer
    
Route::controller(DashboardLicensor::class)->group(function() {
    Route::post('/dashboard/licensor/store', 'store');
});
    // Dashboard/Licensor
    
Route::controller(DashboardStudio::class)->group(function() {
    Route::post('/dashboard/studio/store', 'store');
});
    // Dashboard/Studio
    
Route::controller(DashboardAnime::class)->group(function() { // Anime
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
Route::controller(DashboardAnimeAlias::class)->group(function() { // Anime Alias
    Route::post('/dashboard/animealias/store', 'store');
    Route::post('/dashboard/animealias/update/{id}', 'update');
});
Route::post('/dashboard/animealias/update', function() {return back();});  
Route::controller(DashboardAnimeGenre::class)->group(function() { // Anime Genres
    Route::post('/dashboard/animegenre/store', 'store');
});
Route::controller(DashboardAnimeTheme::class)->group(function() { // Anime Themes
    Route::post('/dashboard/animetheme/store', 'store');
});
Route::controller(DashboardAnimeProducer::class)->group(function() { // Anime Producers
    Route::post('/dashboard/animeproducer/store', 'store');
});
Route::controller(DashboardAnimeLicensor::class)->group(function() { // Anime Licensors
    Route::post('/dashboard/animelicensor/store', 'store');
});
Route::controller(DashboardAnimeStudio::class)->group(function() { // Anime Studios
    Route::post('/dashboard/animestudio/store', 'store');
});
    // Dashboard/Anime