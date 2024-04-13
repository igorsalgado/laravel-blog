<?php

use App\Http\Controllers\ProfileController;
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

//Rotas Home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/posts/{posts}', [\App\Http\Controllers\HomeController::class, 'show']);


//Rotas Admin
Route::prefix('/admin')->group(function () {
    Route::prefix('/posts')
        ->name('admin.posts.')
        ->controller(\App\Http\Controllers\admin\PostsController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index'); //apelido admin.posts.index
            Route::get('/create', 'create')->name('create'); //apelido admin.posts.create
            Route::post('/store', 'store')->name('store'); //apelido admin.posts.store

            Route::get('/{post}/edit', 'edit')->name('edit'); //apelido admin.id.edit
            Route::post('/{post}/edit', 'update')->name('update'); //apelido admin.id.edit

            Route::post('/{post}/destroy', 'destroy')->name('destroy');
        });
});



//Rotas Vite
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
