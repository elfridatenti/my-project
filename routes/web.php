<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;

use App\Http\Controllers\AlumniController;

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardAlumniController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileAlumniController;
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

Route::get('/', [BerandaController::class, 'beranda'])->name("beranda");

route::get('/login', [AuthController::class, 'login'])->name('login');
route::get('/login', [AuthController::class, 'login'])->name('signin');
route::post('/login', [AuthController::class, 'auth'])->name('auth');

route::get('/testmail', [AuthController::class, 'test_mail'])->name('testmail');

route::get('/register', [AuthController::class, 'register'])->name('register');
route::post('/register', [AuthController::class, 'create_alumni_account'])->name('create_alumni_account');
route::get('/register/verifikasi', [AuthController::class, 'verifikasi_email'])->name('verifikasi_email');
route::post('/register/verifikasi', [AuthController::class, 'verifikasi_token'])->name('verifikasi_token');
route::get('/register/data_diri', [AuthController::class, 'data_diri'])->name('data_diri');
route::post('/register/data_diri', [AuthController::class, 'save_data_diri'])->name('save_data_diri');

route::get('/register/data_alumni', [AuthController::class, 'data_alumni'])->name('data_alumni');
route::post('/register/data_alumni', [AuthController::class, 'save_data_alumni'])->name('save_data_alumni');

route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Dashboard Alumni
route::get('/user/alumni', [DashboardAlumniController::class, 'index'])->name('alumni.beranda')->middleware('auth');

route::get('/dashboard/alumni', [DashboardAdminController::class, 'alumni'])->name('dashboard.alumni.index')->middleware('auth');

Route::get('dashboard/profile_alumni', [ProfileAlumniController::class, 'index'])->name('dashboard.profile_alumni.index');

Route::get('dashboard/profile_alumni/create', [ProfileAlumniController::class, 'create'])->name('dashboard.profile_alumni.create');
Route::post('dashboard/profile_alumni/create', [ProfileAlumniController::class, 'store'])->name('dashboard.profile_alumni.store');

Route::get('dashboard/profile_alumni/{id}/edit', [ProfileAlumniController::class, 'edit'])->name('dashboard.profile_alumni.edit');
Route::post('dashboard/profile_alumni/{id}/edit', [ProfileAlumniController::class, 'update'])->name('dashboard.profile_alumni.update');
Route::get('dashboard/profile_alumni/{id}/delete', [ProfileAlumniController::class, 'delete'])->name('dashboard.profile_alumni.delete');

// make for news use slug
Route::get('/news', [BerandaController::class, 'news_index'])->name('news_index');
Route::get('/news/{slug}', [BerandaController::class, 'news'])->name('news');

// News
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::resource('news', NewsController::class);
});

// Dashboard Admin
route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
route::get('/alumni/{id}', [AlumniController::class, 'view'])->name('alumni.detail');
