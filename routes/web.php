<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [ProductController::class, 'index'])->name('index')->middleware('auth');

Route::get('create-get', [ProductController::class, 'ShowCreate'])->name('create-get')->middleware('auth');
Route::post('create-post', [ProductController::class, 'Create'])->name('create-post')->middleware('auth');

Route::get('edit-get/{id}', [ProductController::class, 'ShowEdit'])->name('edit-get')->middleware('auth');
Route::post('edit-post/{id}', [ProductController::class, 'Edit'])->name('edit-post')->middleware('auth');

Route::get('view-get/{id}', [ProductController::class, 'View'])->name('view-get')->middleware('auth');
Route::get('delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete')->middleware('auth');


/*-------------------------*/


Route::get('index-category', [CategoryController::class, 'index_category'])->name('index-category')->middleware('auth');

Route::get('create-category-get', [CategoryController::class, 'ShowCreateCategory'])->name('create-category-get')->middleware('auth');
Route::post('create-category-post', [CategoryController::class, 'CreateCategory'])->name('create-category-post')->middleware('auth');

Route::get('edit-category-get/{id}', [CategoryController::class, 'ShowEditCategory'])->name('edit-category-get')->middleware('auth');
Route::post('edit-category-post/{id}', [CategoryController::class, 'EditCategory'])->name('edit-category-post')->middleware('auth');

Route::get('view-category-get/{id}', [CategoryController::class, 'ViewCategory'])->name('view-category-get')->middleware('auth');
Route::get('delete-category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete-category')->middleware('auth');