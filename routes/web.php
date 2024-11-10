<?php

use App\Livewire\Admin\ItemProducts;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    /* Dashboard controller */
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/admin/barchart', [App\Http\Controllers\Admin\DashboardController::class, 'barChart'])->name('admin.barchart');

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);

    Route::get('item-categories', [App\Http\Controllers\Admin\ItemCategoryController::class, 'index']);

    Route::get('sub-categories', [App\Http\Controllers\Admin\SubCategoryController::class, 'index']);

    Route::get('item-brands', [App\Http\Controllers\Admin\ItemBrandController::class, 'index']);

    Route::get('item-products', [App\Http\Controllers\Admin\ItemProductController::class, 'index']);

    Route::get('item-requests', [App\Http\Controllers\Admin\ItemRequestController::class, 'index']);

    Route::get('request-reports', [App\Http\Controllers\Admin\RequestReportsController::class, 'index']);

    Route::get('suppliers', [App\Http\Controllers\Admin\SupplierController::class, 'index']);

    Route::get('supplier-products', [App\Http\Controllers\Admin\SupplierProductController::class, 'index']);

    Route::get('audit-trails', [App\Http\Controllers\Admin\AuditTrailController::class, 'index']);

    Route::get('admin-profile', [App\Http\Controllers\Admin\AdminProfileController::class, 'index']);

    Route::get('surrender-items', [App\Http\Controllers\Admin\SurrenderItemsController::class, 'index']);

    Route::get('/get-category-name', [ItemProducts::class, 'getCategoryName'])->name('get-category-name');

    /* User Controller */
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');

    });

});

Route::prefix('client')->middleware(['auth','isClient'])->group(function (){
    Route::get('homepage', [App\Http\Controllers\Client\HomepageController::class, 'index']);

    Route::get('user-items', [App\Http\Controllers\Client\UserItemController::class, 'index']);

    Route::get('user-history', [App\Http\Controllers\Client\UserHistoryController::class, 'index']);

    Route::get('user-notifications', [App\Http\Controllers\Client\UserNotificationsController::class, 'index']);

    Route::get('item-products', [App\Http\Controllers\Client\ItemProductController::class, 'index']);

    Route::get('item-requests', [App\Http\Controllers\Client\ItemRequestController::class, 'index']);

    Route::get('user-profile', [App\Http\Controllers\Client\UserProfileController::class, 'index']);
});



