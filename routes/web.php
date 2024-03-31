<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('user.home');
})->name('home');

// LOGIN ====================================================================
Route::get('/login', [LoginController::class, 'loginpage'])->name('login.loginpage');
Route::post('/', [LoginController::class, 'login'])->name('login.submit');
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER ====================================================================
Route::get('/register', [LoginController::class, 'signup'])->name('signup.show');
Route::post('/register/user', [LoginController::class, 'signupuser'])->name('signup.submit');

// ADMIN
// Route::middleware('admin')->group(function () {



// });

// USER
// Route::middleware('user')->group(function () {



// });





Route::get('/profile', function () {
    return view('user.profile');
});
