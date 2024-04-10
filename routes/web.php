<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Models\Post;
use Illuminate\Http\Request;
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

Route::get('/login',[ AuthController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/login',[ AuthController::class, 'doLogin'])->middleware('guest');

Route::get('/register',[AuthController::class, 'register'])->name('auth.register')->middleware('guest');
Route::post('/register',[AuthController::class, 'doRegister'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');


Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/',  'index')->name('index');

    Route::get('/new', 'create')->name('create')->middleware('auth');
    Route::post('/new', 'store')->middleware('auth');

    Route::get('/{post}/edit', 'edit')->name('edit')->middleware('auth');
    Route::post('/{post}/edit', 'update')->middleware('auth');

    Route::get('/{slug}-{post}', 'show')->where([
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
});
