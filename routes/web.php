<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin All Route
Route::controller(AdminController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');

    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});

//
Route::controller(SupplierController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');

    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
    Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');

    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
});

// Customer All Route
Route::controller(CustomerController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/customer/all', 'CustomerAll')->name('customer.all');
    Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
    Route::post('/customer/store', 'CustomerStore')->name('customer.store');

    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');

    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
});

// Unit All Route
Route::controller(UnitController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/unit/all', 'UnitAll')->name('unit.all');
    Route::get('/unit/add', 'UnitAdd')->name('unit.add');
    Route::post('/unit/store', 'UnitStore')->name('unit.store');

    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/unit/update', 'UnitUpdate')->name('unit.update');

    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
});

require __DIR__ . '/auth.php';
