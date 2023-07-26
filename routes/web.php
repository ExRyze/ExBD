<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardAnime;
use App\Http\Controllers\DashboardAnimeRelationsMTM;
use App\Http\Controllers\DashboardAnimeComponents;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\DashboardAnimeVideo;
use App\Http\Controllers\DashboardAnimeVideoComponents;
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
    Route::get('/setting/profile', 'profile');
    Route::post('/setting/profile/update', 'updateProfile');
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
    Route::post('/dashboard/user/update', 'update');
    Route::post('/dashboard/user/delete', 'delete');
});
Route::get('/dashboard/user/edit', function() {return back();});
    // Dashboard/User

Route::controller(DashboardAnime::class)->group(function() { // Anime
    Route::get('/dashboard/anime', 'index');
    Route::get('/dashboard/anime/create', 'create');
    Route::post('/dashboard/anime/store', 'store');
    Route::get('/dashboard/anime/edit/{slug}', 'edit');
    Route::post('/dashboard/anime/update/', 'update');
    Route::post('/dashboard/anime/delete', 'delete');
});
Route::get('/dashboard/anime/edit', function() {return back();});
    // Dashboard/Anime
   
Route::controller(DashboardAnimeComponents::class)->group(function() {
    Route::post('/dashboard/animealias/store', 'storeAlias');
    Route::post('/dashboard/animealias/update', 'updateAlias');
    Route::post('/dashboard/animegenre/store', 'storeGenre');
    Route::post('/dashboard/animelicensor/store', 'storeLicensor');
    Route::post('/dashboard/animemistake/store', 'storeMistake');
    Route::post('/dashboard/animeproducer/store', 'storeProducer');
    Route::post('/dashboard/animestudio/store', 'storeStudio');
    Route::post('/dashboard/animetheme/store', 'storeTheme');
});
    // Dashboard/{Component}
     
Route::controller(DashboardAnimeRelationsMTM::class)->group(function() {
    Route::post('/dashboard/animerelation/store', 'storeRelation');
    Route::post('/dashboard/animerelation/update', 'updateRelation');
    Route::post('/dashboard/animerelationgenre/store', 'storeGenre');
    Route::post('/dashboard/animerelationlicensor/store', 'storeLicensor');
    Route::post('/dashboard/animerelationproducer/store', 'storeProducer');
    Route::post('/dashboard/animerelationstudio/store', 'storeStudio');
    Route::post('/dashboard/animerelationtheme/store', 'storeTheme');
});
    // Dashboard/{AnimeComponent}

Route::controller(DashboardAnimeVideo::class)->group(function() {

    // Folder
    Route::get('/dashboard/anime/folder', 'folder');
    Route::post('/dashboard/anime/folder/store', 'storeFolder');
    Route::post('/dashboard/anime/folder/approve', 'approveFolder');
    Route::post('/dashboard/anime/folder/delete', 'deleteFolder');

    // Video
    Route::get('/dashboard/anime/video/{slug}', 'video');
    Route::get('/dashboard/anime/video/{slug}/create', 'createVideo');
    Route::post('/dashboard/anime/video/{slug}/store', 'storeVideo');
    Route::get('/dashboard/anime/video/{slug}/edit/{title}', 'editVideo');
    Route::post('/dashboard/anime/video/{slug}/update', 'updateVideo');
    Route::post('/dashboard/anime/video/{slug}/approve', 'approveVideo');
    Route::post('/dashboard/anime/video/{slug}/delete', 'deleteVideo');

    // History
    Route::get('/dashboard/anime/history/video', 'histories');
    Route::get('/dashboard/anime/history/video/{slug}', 'history');
    Route::post('/dashboard/anime/history/video/{slug}/retrieve', 'retrieveHistory');
    Route::post('/dashboard/anime/history/video/{slug}/delete', 'deleteHistory');
});
Route::get('/dashboard/anime/video', function() {return back();});
Route::get('/dashboard/anime/video/{slug}/edit', function() {return back();});
Route::get('/dashboard/anime/history', function() {return back();});
    // Dashboard/video

Route::controller(DashboardAnimeVideoComponents::class)->group(function() {
    Route::post('/dashboard/animevideosubtitle/store', 'storeAnimeSubtitle');
    Route::post('/dashboard/animevideosubtitle/update', 'updateAnimeSubtitle');
    Route::post('/dashboard/animevideomistake/store', 'storeAnimeMistake');
}); // Dashboard/{VideoAnimeComponent}