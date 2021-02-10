<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\MailController;
use App\Notifications\AlertWifiNotif;
use App\Models\Ticket;
use App\Models\Admin;
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
    return view('welcome');
});
Route::get('/wifi', function () {
    //$admin = Admin::find(2);
    //$admin = Auth::guard('admin')->user();
    //dd($admin);
    Ticket::destroy(20);
    // Ticket::create([

    //     'login' => 'silver',
    //     'password' => 'This_is_silver',
    //     'type' => '1heure',
    //     'heure' => '1',

    // ]);

    //$admin->notify(new App\Notifications\AlertWifiNotif);

    // Notification::route('mail', 'moiset.2580@gmail.com')
    //         ->notify(new AlertWifiNotif());

    return "delete sent success";
});

// Authentification routes

//Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('adminLogin');
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm'])->name('adminRegister');


Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('/admin', 'admin');
    Route::view('/admin/rechargeTickets', 'admin');
    Route::view('/admin/remainingTickets', 'admin');
    Route::view('/admin/listTickets', 'admin');
});

Route::post('/logout', [LoginController::class,'logout'])->name('logout');

// Admin Dashboard Routes

Route::get('/admin',  [AdminDashController::class,'showRechargeForm'])->middleware('auth:admin');
Route::post('/admin',  [AdminDashController::class,'RechargeTickets'])->middleware('auth:admin');

Route::get('/admin/rechargeTickets',  [AdminDashController::class,'showRechargeForm'])->middleware('auth:admin')->name('rechargeTickets');
Route::get('/admin/remainingTickets',  [AdminDashController::class,'showRemainingTickets'])->middleware('auth:admin')->name('remainingTickets');
Route::get('/admin/listTickets',  [AdminDashController::class,'showListTickets'])->middleware('auth:admin')->name('listTickets');


//Route::get('/sendEmail',  [MailController::class,'sendEmail']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
