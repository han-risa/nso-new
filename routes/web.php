<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;

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

//Route for master
// Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/dashboard', [MasterController::class, 'index']);
// Route::get('/logdata', [MasterController::class, 'logData']);
// Route::get('/osm', [MasterController::class, 'osm']);
// Route::get('/drain', [MasterController::class, 'drain']);
// Route::get('/user', [MasterController::class, 'user']);
// Route::get('/getdata',[MasterController::class, 'dashboardAjax']);

// //Route for user
// Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
// Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
// Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Database connection error: ' . $e->getMessage();
    }
});


// Revisi route authorisasi menggunakan spatie permission

// route untuk login dan logout
route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

// route untuk dashboard
route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MasterController::class, 'index'])->name('dashboard');
    Route::get('/logdata', [MasterController::class, 'logData']);
    Route::get('/osm', [MasterController::class, 'osm']);
    Route::get('/drain', [MasterController::class, 'drain']);
    Route::get('/getdata',[MasterController::class, 'dashboardAjax']);

    Route::middleware(['role:Admin'])->group(function () {
        Route::resource('user', AuthController::class);
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
