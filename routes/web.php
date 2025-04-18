<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RFQController;
use App\Http\Controllers\PurchaseOrderController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['role:vendor', 'approved.vendor'])->group(function () {
        Route::resource('products', ProductController::class);  
        Route::get('pos', [PurchaseOrderController::class, 'index'])->name('pos.index');
        Route::post('pos/{id}/confirm', [PurchaseOrderController::class, 'confirm'])->name('pos.confirm');
        Route::post('pos/{id}/decline', [PurchaseOrderController::class, 'decline'])->name('pos.decline');
    });
    

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/vendors', [AdminController::class, 'vendorList'])->name('admin.vendors');
        Route::post('/admin/vendors/{id}/approve', [AdminController::class, 'approveVendor'])->name('admin.vendors.approve');
    
        Route::get('/admin/rfqs', [AdminController::class, 'rfqList'])->name('admin.rfqs.index');
        Route::post('/admin/rfqs/{id}/approve', [AdminController::class, 'approveRFQ'])->name('admin.rfqs.approve');
        Route::post('/admin/rfqs/{id}/reject', [AdminController::class, 'rejectRFQ'])->name('admin.rfqs.reject');
    });

    Route::middleware('role:buyer')->group(function () {
        Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');
        Route::resource('rfqs', RFQController::class);
    });
});


