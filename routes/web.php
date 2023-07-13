<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardAnime;
use App\Http\Controllers\DashboardAnimeComponents;
use App\Http\Controllers\DashboardComponents;
use App\Http\Controllers\DashboardFolder;
use App\Http\Controllers\DashboardHistory;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\DashboardVideo;
use App\Http\Controllers\DashboardVideoComponents;
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
Route::get('/dashboard/user/update', function() {return back();});
Route::get('/dashboard/user/delete', function() {return back();});
    // Dashboard/User
   
Route::controller(DashboardComponents::class)->group(function() {
    Route::post('/dashboard/producer/store', 'storeProducer');
    Route::post('/dashboard/licensor/store', 'storeLicensor');
    Route::post('/dashboard/studio/store', 'storeStudio');
    Route::post('/dashboard/genre/store', 'storeGenre');
    Route::post('/dashboard/theme/store', 'storeTheme');
    Route::post('/dashboard/mistake/store', 'storeMistake');
});
    // Dashboard/{Component}

Route::controller(DashboardAnime::class)->group(function() { // Anime
    Route::get('/dashboard/anime', 'index');
    Route::get('/dashboard/anime/create', 'create');
    Route::post('/dashboard/anime/store', 'store');
    Route::get('/dashboard/anime/edit/{slug}', 'edit');
    Route::post('/dashboard/anime/update/{id}', 'update');
    Route::get('/dashboard/anime/delete/{slug}', 'delete');
});
Route::get('/dashboard/anime/edit', function() {return back();});
Route::get('/dashboard/anime/update', function() {return back();});
Route::get('/dashboard/anime/delete', function() {return back();});
    // Dashboard/Anime
     
Route::controller(DashboardAnimeComponents::class)->group(function() {
    Route::post('/dashboard/animealias/store', 'storeAlias');
    Route::post('/dashboard/animealias/update/{id}', 'updateAlias');
    Route::post('/dashboard/animeproducer/store', 'storeProducer');
    Route::post('/dashboard/animelicensor/store', 'storeLicensor');
    Route::post('/dashboard/animestudio/store', 'storeStudio');
    Route::post('/dashboard/animegenre/store', 'storeGenre');
    Route::post('/dashboard/animetheme/store', 'storeTheme');
});
Route::get('/dashboard/animealias/update', function() {return back();}); 
    // Dashboard/{AnimeComponent}
     
Route::controller(DashboardFolder::class)->group(function() {
    Route::get('/dashboard/anime/folder', 'folderAnime');
    Route::post('/dashboard/anime/folder/store', 'storeAnime');
    Route::post('/dashboard/anime/folder/approve', 'approveAnime');
    Route::get('/dashboard/anime/folder/delete/{id}', 'deleteAnime');
});
Route::get('/dashboard/anime/folder/delete', function() {return back();});
    // Dashboard/Folder
     
Route::controller(DashboardVideo::class)->group(function() {
    Route::get('/dashboard/anime/video/{slug}', 'videoAnime');
    Route::get('/dashboard/anime/video/{slug}/create', 'createAnime');
    Route::post('/dashboard/anime/video/{slug}/store', 'storeAnime');
    Route::get('/dashboard/anime/video/{slug}/edit/{title}', 'editAnime');
    Route::post('/dashboard/anime/video/{slug}/update', 'updateAnime');
    Route::post('/dashboard/anime/video/{slug}/approve', 'approveAnime');
    Route::get('/dashboard/anime/video/{slug}/delete/{id}', 'deleteAnime');
});
Route::get('/dashboard/anime/video', function() {return back();});
Route::get('/dashboard/anime/video/{slug}/edit', function() {return back();});
Route::get('/dashboard/anime/video/{slug}/delete', function() {return back();});
    // Dashboard/video

Route::controller(DashboardVideoComponents::class)->group(function() {
    Route::post('/dashboard/animevideosubtitle/store', 'storeAnimeSubtitle');
    Route::post('/dashboard/animevideosubtitle/update', 'updateAnimeSubtitle');
    Route::post('/dashboard/animevideomistake/store', 'storeAnimeMistake');
}); // Dashboard/{VideoComponent}

Route::controller(DashboardHistory::class)->group(function() {
    Route::get('/dashboard/anime/history/video', 'historiesAnime');
    Route::get('/dashboard/anime/history/video/{slug}', 'historyAnime');
    Route::get('/dashboard/anime/history/video/{slug}/retrive/{id}', 'retriveAnime');
    Route::get('/dashboard/anime/history/video/{slug}/delete/{id}', 'deleteAnime');
});
Route::get('/dashboard/anime/history', function() {return back();});
Route::get('/dashboard/anime/history/video/{slug}/delete', function() {return back();});
Route::get('/dashboard/anime/history/video/{slug}/retrive', function() {return back();});
    // Dashboard/History