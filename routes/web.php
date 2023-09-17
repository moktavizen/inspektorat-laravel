<?php

use App\Http\Controllers\AgendasController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{menu:slug}', [HomeController::class, 'showMenu'])->name('viewMenu');
Route::get('/details/{dropdown_item:slug}', [HomeController::class, 'showDropdownItem'])->name('viewDropdownItem');
Route::get('/services/{service:slug}', [HomeController::class, 'showService'])->name('viewService');
Route::get('/docs', [DocsController::class, 'index'])->name('docs');
Route::get('/agendas', [AgendasController::class, 'index'])->name('agendas');
Route::get('/agendas/{agenda:slug}', [HomeController::class, 'showAgenda'])->name('viewAgenda');
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [HomeController::class, 'showPost'])->name('viewPost');
