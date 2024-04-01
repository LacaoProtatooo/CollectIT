<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectibleController;

use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', [CollectibleController::class, 'populate'])->name('home');
Route::get('/welcome', function () { return view('home.welcome'); })->name('welcome');
Route::get('/cart', function () { return view('user.cart'); })->name('cart');

// LOGIN =======================================================================
Route::get('/login', [LoginController::class, 'loginpage'])->name('login.loginpage');
Route::post('/', [LoginController::class, 'login'])->name('login.submit');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER ====================================================================
Route::get('/register', [LoginController::class, 'signup'])->name('signup.show');
Route::post('/register/user', [LoginController::class, 'signupuser'])->name('signup.submit');
// Verify Email
Route::get('/account/verify/{email}', [UserController::class, 'verifyemail'])->name('account.verify');

// ADMIN =======================================================================
// Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/{collectibleid}/collectible-details', [Admincontroller::class, 'details'])->name('admin.collectibledetails');

    // Events
    Route::get('/event', [EventController::class, 'events'])->name('event.show');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/event/{id}/update', [EventController::class, 'update'])->name('event.update');
    Route::get('/event/{id}/delete', [EventController::class, 'delete'])->name('event.delete');

    // Couriers
    Route::get('/courier', [CourierController::class, 'couriers'])->name('courier.show');
    Route::get('/courier/create', [CourierController::class, 'create'])->name('courier.create');
    Route::post('/courier/store', [CourierController::class, 'store'])->name('courier.store');
    Route::get('/courier/{id}/edit', [CourierController::class, 'edit'])->name('courier.edit');
    Route::post('/courier/{id}/update', [CourierController::class, 'update'])->name('courier.update');
    Route::get('/courier/{id}/delete', [CourierController::class, 'delete'])->name('courier.delete');

// });

// USER =========================================================================
//Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');

    // Collectible
    Route::get('/collectibles', [CollectibleController::class, 'collectibles'])->name('collectibles.show');
    Route::get('/collectible/create', [CollectibleController::class, 'create'])->name('collectible.create');
    Route::post('/collectible/store', [CollectibleController::class, 'store'])->name('collectible.store');
    Route::get('/collectible/{id}/edit', [CollectibleController::class, 'edit'])->name('collectible.edit');
    Route::post('/collectible/{id}/update', [CollectibleController::class, 'update'])->name('collectible.update');
    Route::get('/collectible/{id}/delete', [CollectibleController::class, 'delete'])->name('collectible.delete');

    Route::get('/collectible/info/{id}', [CollectibleController::class, 'collectibleinfo'])->name('collectible.info');

    Route::prefix('/collectible/cart')->group(function () {
        Route::get('/{id}', [CartController::class, 'create'])->name('cart.create');
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
    });




//});





