<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Home URLS

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'home']);

// Admin URLS

Route::get('/admin_category', [AdminController::class, 'admin_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

// Product URLS
Route::get('/view_products', [AdminController::class, 'view_products']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_products', [AdminController::class, 'show_products']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
