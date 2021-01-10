<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth::routes();
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload', [App\Http\Controllers\HomeController::class, 'getUpload'])->name('upload');
Route::post('/upload', [App\Http\Controllers\HomeController::class, 'postUpload'])->name('upload');


Route::get('/album/create', [App\Http\Controllers\HomeController::class, 'getCreateAlbum'])->name('create.album');
Route::post('/album/create', [App\Http\Controllers\HomeController::class, 'postCreateAlbum'])->name('create.album');

Route::get('/album/list', [App\Http\Controllers\HomeController::class, 'getListAlbum'])->name('list.album');
Route::get('/album/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteAlbum'])->name('delete.album');
Route::get('/album/edit/{id}', [App\Http\Controllers\HomeController::class, 'getEditAlbum'])->name('edit.album');
Route::post('/album/edit', [App\Http\Controllers\HomeController::class, 'postEditAlbum'])->name('post.edit.album');

Route::get('/album/{id}/video', [App\Http\Controllers\HomeController::class, 'videoAlbum'])->name('video.album');


Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show.video');
Route::get('/video/edit/{id}', [App\Http\Controllers\HomeController::class, 'getEditVideo'])->name('edit.video');
Route::post('/video/edit', [App\Http\Controllers\HomeController::class, 'postEditVideo'])->name('post.edit.video');

Route::get('/video/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteVideo'])->name('delete.video');

Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'getProfile'])->name('profile');
Route::post('/profile/edit', [App\Http\Controllers\HomeController::class, 'postEditProfile'])->name('edit.profile');
Route::post('/profile/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change.password');


