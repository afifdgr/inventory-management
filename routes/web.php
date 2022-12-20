<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

require __DIR__ . '/auth.php';
