<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectibleController;

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

Route::get('/', function () { return view('home.home'); })->name('home');
Route::get('/welcome', function () { return view('home.welcome'); })->name('welcome');

// LOGIN =======================================================================
Route::get('/login', [LoginController::class, 'loginpage'])->name('login.loginpage');
Route::post('/', [LoginController::class, 'login'])->name('login.submit');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER ====================================================================
Route::get('/register', [LoginController::class, 'signup'])->name('signup.show');
Route::post('/register/user', [LoginController::class, 'signupuser'])->name('signup.submit');

// ADMIN =======================================================================
// Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');


// });

// USER =========================================================================
//Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/collectibles', [UserController::class, 'collectibles'])->name('collectibles.show');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');

    // Collectible
    Route::get('/collectible/create', [CollectibleController::class, 'create'])->name('collectible.create');
    Route::post('/collectible/store', [CollectibleController::class, 'store'])->name('collectible.store');
    Route::get('/collectible/{id}/edit', [CollectibleController::class, 'edit'])->name('collectible.edit');
    Route::post('/collectible/{id}/update', [CollectibleController::class, 'update'])->name('collectible.update');
    Route::get('/collectible/{id}/delete', [CollectibleController::class, 'delete'])->name('collectible.delete');


//});


