<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\TestingController;
use App\Http\Controllers\Home\HomeSliderController;

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
    return view('frontend.index');
});

//Show Login Page - edit later
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [IndexController::class, 'Index']);

//User Role
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard'); //user dashboard
});


//Admin Role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin']); // edit later


//adminroute
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'AdminDestroy')->name('admin.logout');
    Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
    Route::get('admin/profile/edit', 'AdminEditProfile')->name('admin.edit.profile');
    Route::get('/admin/profile/changepassword', 'AdminChangePassword')->name('admin.change.password');
    Route::post('/store/profile', 'AdminProfileStore')->name('admin.profile.store');
    Route::post('/admin/updatepassword', 'AdminUpdatePassword')->name('admin.update.password');
});

// Home Slide All Route 
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
