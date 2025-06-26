<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome',['posts'=>Post::paginate(3)]);
})->name('home');
Route::get('/user', [UserController::class, 'index']);
Route::get('/create', [postController::class, 'create']);
Route::post('/store', [postController::class, 'ourFilestore'])->name('store');
Route::get('/edit/{id}', [postController::class, 'editStore'])->name('edit');
Route::post('/update/{id}', [postController::class, 'updateStore'])->name('update');
Route::get('/delete/{id}', [postController::class, 'deleteData'])->name('delete');
Route::get('/view/{id}', [postController::class, 'viewData'])->name('view');
Route::get('/search', [UserController::class, 'search'])->name('search');