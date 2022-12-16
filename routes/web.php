<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::any('/', function () {
    return view('welcome');
});*/

Route::any('/', [HomeController::class, 'index']);

Route::GET('/a-posts', [HomeController::class, 'get_newsList'])->name('a.posts');
Route::GET('/a-posts-other', [HomeController::class, 'get_newsList_other'])->name('a.posts.other');
Route::GET('/a-posts-infoList', [HomeController::class, 'get_newsList_infoList'])->name('a.posts.infoList');
Route::GET('/a-posts-map', [HomeController::class, 'get_newsList_map'])->name('a.posts.map');
Route::GET('/a-posts-news', [HomeController::class, 'get_newsList_news'])->name('a.posts.news');