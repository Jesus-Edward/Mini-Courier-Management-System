<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCourierController;
use App\Http\Controllers\Admin\AdminParcelController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Models\Admin;
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

Route::get('/', [AdminController::class, 'loginForm'])->name('admin.login.form');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::middleware('admin')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

        // Admin Creation Page
        Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('admin/create/form', [AdminController::class, 'adminCreateForm'])->name('admin.create');
        Route::post('admin/store/', [AdminController::class, 'createAdmin'])->name('admin.store-admin');
        Route::get('admin/edit/{id}/form', [AdminController::class, 'adminEditForm'])->name('admin.edit');
        Route::put('admin/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.update-admin');
        Route::delete('admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');

        //Admin Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');

        // Courier Resource Routes
        Route::get('courier/index', [AdminCourierController::class, 'index'])->name('courier.index');
        Route::get('courier/create', [AdminCourierController::class, 'create'])->name('courier.create');
        Route::post('courier/store', [AdminCourierController::class, 'store'])->name('courier.store');
        Route::get('courier/edit/{id}', [AdminCourierController::class, 'edit'])->name('courier.edit');
        Route::put('courier/update/{id}', [AdminCourierController::class, 'update'])->name('courier.update');
        Route::delete('courier/delete/{id}', [AdminCourierController::class, 'destroy'])->name('courier.destroy');

        // Parcel Resource Routes
        Route::get('parcel/index', [AdminParcelController::class, 'index'])->name('parcel.index');
        Route::get('parcel/create', [AdminParcelController::class, 'create'])->name('parcel.create');
        Route::post('parcel/store', [AdminParcelController::class, 'store'])->name('parcel.store');
        Route::get('parcel/get/{id}', [AdminParcelController::class, 'edit'])->name('parcel.edit');
        Route::put('parcel/update/{id}', [AdminParcelController::class, 'update'])->name('parcel.update');
        Route::delete('parcel/delete/{id}', [AdminParcelController::class, 'destroy'])->name('parcel.delete');
        Route::get('parcel/receipt/{parcel}', [AdminParcelController::class, 'receipt'])->name('parcel.receipt');

        Route::get('users/index', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('users/delete/{id}', [AdminUserController::class, 'deleteUser'])->name('users.delete');
    });
});
