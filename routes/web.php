<?php

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


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModifyController;
use App\Http\Controllers\InsertController;


Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/category', [CategoryController::class, 'show']);
Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('modify', [ModifyController::class, 'show'])->name('modify');
Route::get('insert', [InsertController::class, 'show'])->name('insert');

Route::match(['GET', 'POST'], 'select', [ModifyController::class, 'select']);


Route::post('modify_banner', [ModifyController::class, 'modify_banner']);
Route::post('modify_category', [ModifyController::class, 'modify_category']);
Route::post('modify_product', [ModifyController::class, 'modify_product']);
Route::post('modify_social', [ModifyController::class, 'modify_social']);

Route::post('delete_banner', [ModifyController::class, 'delete_banner']);
Route::post('delete_category', [ModifyController::class, 'delete_category']);
Route::post('delete_product', [ModifyController::class, 'delete_product']);
Route::post('delete_social', [ModifyController::class, 'delete_social']);

Route::post('insert_action_banner', [InsertController::class, 'action_banner']);
Route::post('insert_action_category', [InsertController::class, 'action_category']);
Route::post('insert_action_product', [InsertController::class, 'action_product']);
Route::post('insert_action_social', [InsertController::class, 'action_social']);


