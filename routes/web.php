<?php

use Illuminate\Support\Facades\Route;
use App\Models\ClientInvoice;
use App\Http\Controllers\Admin\{ClientInvoicesController,
    CostController,
    CountryController,
    SupplierController,
    CategoryController,
    CurrencyController,
    ClientController,
    SupplierInvoiceController,
    UserController,
    ClientInvoiceDetailController,
    SettingController};
use App\Http\Controllers\Admin\Chatting\{SessionController, SessionDmController};
//use App\Http\Controllers\Category\CategoryController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', 'HomeController@index');

    Route::group(['namespace' => 'Admin'], function () {
        Route::resource('suppliers', SupplierController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('users', UserController::class);
        Route::resource('costs', CostController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('currencies', CurrencyController::class);
        Route::resource('client-invoices', ClientInvoicesController::class);
        Route::resource('client-invoices/{clientInvoice}/client-invoice-details', ClientInvoiceDetailController::class);

        Route::resource('supplier-invoices', SupplierInvoiceController::class);
        Route::patch('users/{user_id}/block-toggle', [UserController::class, 'blockToggle'])->name('users.block_toggle');
        Route::patch('supplier-invoices/{supplier_invoice_id}/block-toggle', [SupplierInvoiceController::class, 'blockToggle'])->name('supplier-invoices.block_toggle');


    });
});
//


Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function () {

    Route::get('login', function () {
        return view('auth.login');
    })->name('login');
    Route::get('register', function () {
        return view('auth.register');
    });
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
