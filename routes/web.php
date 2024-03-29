<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\UserregisterController;

use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\CustomersUserController;

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

Route::get('user-datatables', function () {
    return view('livewire/user-datatables');
});

/*For Normal User: Used in frontend Login*/
Route::group(['middleware' => 'disable_back_btn_for_user'], function () {
    Route::middleware(['auth:web,sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('userdashboard/index');
        })->name('dashboard');

        Route::prefix('/dashboard')->group(function(){
            Route::get('/my-profile/{id}', [UserProfileController::class, 'index'])->name('user.my.profile');
            Route::post('/my-profile/update/{id}', [UserProfileController::class, 'update'])->name('user.my.profile.update');
        

        /*Customers Routes*/
        Route::get('/customers', [CustomersUserController::class, 'index'])->name('user.all.customers');
        Route::get('/customers/ajaxdata', [CustomersUserController::class, 'getdata'])->name('user.customers.getdata');
        Route::get('/customers/add', [CustomersUserController::class, 'create'])->name('user.create.customers');
        Route::post('/customers/store',[CustomersUserController::class,'store'])->name('user.customers.store');
        Route::get('/customers/edit/{id}', [CustomersUserController::class, 'edit'])->name('user.customers.edit');
        Route::post('/customers/update/{id}',[CustomersUserController::class,'update'])->name('user.customers.update');
        Route::get('/customers/delete/{id}',[CustomersUserController::class,'delete'])->name('user.customers.delete');

        Route::namespace('App\Http\Controllers\User')->name('admin.')->group(function(){
            Route::resource('roles','RoleController');
            Route::resource('permissions','PermissionController');
            Route::resource('users','UserController');
            Route::resource('posts','PostController');
        });
        });
    });
});

/*For Admin Section*/
#XSS Protection
Route::group(['middleware' => 'XSS'], function(){
    Route::middleware('admin:admin')->group(function () {
        Route::get('admin/login', [AdminController::class, 'loginForm']);
        Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
    });
});
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/admin/dashboard', function () {
                return view('admin/index');
            })->name('dashboard');



            /*Customers Routes*/
            Route::get('/admin/customers', [CustomersController::class, 'index'])->name('all.customers');
            Route::get('/admin/ajaxdata', [CustomersController::class, 'getdata'])->name('customers.getdata');
            Route::get('/admin/customers/add', [CustomersController::class, 'create'])->name('create.customers');
            Route::post('/admin/customers/store',[CustomersController::class,'store'])->name('customers.store');
            Route::get('/admin/customers/edit/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
            Route::post('/admin/customers/update/{id}',[CustomersController::class,'update'])->name('customers.update');
            Route::get('/admin/customers/delete/{id}',[CustomersController::class,'delete'])->name('customers.delete');

        });
    });
});