<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Frontend\IndexController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });

//Show Login Page - edit later
// Route::get('/', function () {
//     return view('auth.login');
// });1

//Guests
Route::get('/', [IndexController::class, 'Index']);

// Route::middleware(['auth'])->group(function () {

//     Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');

//     Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

//     Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

//     Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
// });
//END GUESTS                               


//////////////////////////////////////////////////////////////////
// USER ROUTES //                             
//////////////////////////////////////////////////////////////////////-->
Route::middleware(['auth', 'role:user'])->group(function () {

    // Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard'); //user dashboard
    Route::get('/user/dashboard', [UserController::class, 'transanctions'])->name('transanctions');
    // Route::get('/user/dashboard', [TransactionController::class, 'transanctions'])->name('transanctions');
    Route::get('/user/addmoney', [UserController::class, 'create']); //Addmoney
    Route::post('/user/addmoney', [UserController::class, 'store']);

    Route::get('/user/logout', [UserController::class, 'UserDestroy'])->name('user.logout');

    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');

    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');

    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');

  
});



require __DIR__ . '/auth.php';
// END USERS //  

//Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    // Route::get('admin/profile/edit', [AdminController::class, 'AdminEditProfile'])->name('admin.edit.profile'); // TO DELETE

    Route::get('/admin/profile/changepassword', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/store/profile', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::post('/admin/updatepassword', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});


Route::get('/admin/login', [AdminController::class, 'AdminLogin']);

Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');

// Route::post('/user/register', [UserController::class, 'UserRegister'])->name('user.register');
// Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');

// Home Slide All Route 
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
