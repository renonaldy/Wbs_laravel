<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Mail;

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
    return view('main');
});

Route::get('kebijakan', function () {
    return view('home/kebijakan');
});

Route::get('struktur', function () {
    return view('home/struktur');
});

Route::get('pelaporan', function () {
    return view('home/pelaporan');
});



// Route::get('register', function () {
//     return view('home.register');
// });

Route::get('login.wa', function () {
    return view('login/log-in-wa');
});

Route::get('register', [AuthController::class, 'index']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('masuk', [AuthController::class, 'masuk']);
Route::post('verifikasi_register', [AuthController::class, 'verifikasi_register'])->name('verifikasi_register');
Route::post('verifikasi_success', [AuthController::class, 'verifikasi_success'])->name('verifikasi_success');
Route::get('login', function () {
    return view('home.login');
});
Route::post('otp_login', [AuthController::class, 'otp_login'])->name('otp_login');
Route::post('verifikasi_otp_login', [AuthController::class, 'verifikasi_otp_login'])->name('verifikasi_otp_login');

// Route::post('store', [LaporanController::class, 'store'])->name('store');

// Route::get('register', [AuthController::class, 'register']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('home/register', 'AuthController@index');


//Route Dashborad

// Route::get('dashboard', [DashboardController@index])

Route::get('dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('lapor', [LaporanController::class, 'index']);

Route::get('dashboard_kebijakan', function () {
    return view('dashboard.kebijakan');
});

Route::get('dashboard_pelaporan', function () {
    return view('dashboard.pelaporan');
});

Route::get('dashboard_mekanisme', function () {
    return view('dashboard.mekanisme');
});

Route::get('dashboard_struktur', function () {
    return view('dashboard.struktur');
});


Route::get('profil', function () {
    return view('dashboard.profil');
});

Route::get('profiledit', function () {
    return view('dashboard.profiledit');
});

Route::get('create', function () {
    return view('create');
});


//sidebar
// Route::post('laporan.store', [LaporanController::class, 'store'])->name('laporan.store');
// Route::get('laporan.create', [LaporanController::class, 'create'])->name('laporan.create');
// Route::get('laporan.detail', [LaporanController::class, 'store'])->name('laporan.detail');


Route::get('lapor', [LaporanController::class, 'index'])->name('lapor');
Route::get('add_post', [LaporanController::class, 'add_post'])->name('add_post');
Route::post('store', [LaporanController::class, 'store'])->name('store');
Route::get('list', [LaporanController::class, 'list']);
Route::get('edit', [LaporanController::class, 'edit'])->name('edit');
Route::get('detail', [LaporanController::class, 'detail'])->name('detail');
Route::post('update', [LaporanController::class, 'update'])->name('upate');
// Route::post
//


Route::get('otp', function () {
    $otp = 'token';
    Mail::to('konyetnyet28@gmail.com')->send(new SendOtp($otp));
});
