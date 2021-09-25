<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PageController;

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

//Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Rutas protegidas por middleware de autenticación
Route::middleware('auth')->group(function () {
    Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('favorites/create', [FavoriteController::class, 'create'])->name('favorites.create');
    Route::post('favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::get('favorites/{favorite}/edit', [FavoriteController::class, 'edit'])->name('favorites.edit');
    Route::put('favorites/{favorite}', [FavoriteController::class, 'update'])->name('favorites.update');
    Route::delete('favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::resource('categories', CategoryController::class);
});

//Rutas públicas, es decir cualquiera puede ingresar
Route::get('/', [PageController::class, 'home'])->name('pages.home');
Route::get('home', [PageController::class, 'home'])->name('pages.home');
Route::get('/favorites/{favorite}', [FavoriteController::class, 'show'])->name('favorites.show');
