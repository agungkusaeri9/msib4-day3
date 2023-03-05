<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::redirect('/home', '/', 301);

Route::get('/', 'HomeController@index')->name('home');

// tugas 5
Route::get('/tugas5', 'Tugas5Controller@index')->name('tugas5.index');
Route::get('/tugas5/bootstrap', 'Tugas5Controller@bootstrap')->name('tugas5.bootstrap');
Route::get('/tugas5/semantic', 'Tugas5Controller@semantic')->name('tugas5.semantic');

// tugas 6
Route::get('/tugas6', 'Tugas6Controller@index')->name('tugas6.index');
Route::get('/tugas6/jqueryui', 'Tugas6Controller@jqueryui')->name('tugas6.jqueryui');
Route::get('/tugas6/leafletjs', 'Tugas6Controller@leafletjs')->name('tugas6.leafletjs');

// tugas 7
Route::get('/tugas7/getdata', 'Tugas7Controller@data')->name('tugas7.data');
Route::get('/tugas7', 'Tugas7Controller@index')->name('tugas7.index');

// tugas 8
Route::get('/tugas8', 'Tugas8Controller@index')->name('tugas8.index');
Route::get('/tugas8/chartjs', 'Tugas8Controller@chartjs')->name('tugas8.chartjs');

// tugas 9
Route::get('/tugas9', 'Tugas9Controller@index')->name('tugas9.index');
Route::get('/tugas9/google-view', 'Tugas9Controller@google_view')->name('tugas9.google-view');
Route::get('/tugas9/google/callback', 'Tugas9Controller@google_callback')->name('tugas9.google-callback');


// tugas 10
Route::get('/tugas10', 'Tugas10Controller@index')->name('tugas10.index');
Route::get('/tugas10/export-excel', 'Tugas10Controller@excel')->name('tugas10.excel');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        Route::get('/', 'DashboardController')->name('dashboard')->middleware('can:dashboard');
        Route::get('/profile', 'ProfileController@show')->name('profile.show')->middleware('can:profile-edit');
        Route::post('/profile', 'ProfileController@update')->name('profile.update')->middleware('can:profile-edit');

        // users
        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('users.index')->middleware('can:user-view');
            Route::get('/create', 'UserController@create')->name('users.create')->middleware('can:user-create');
            Route::post('/create', 'UserController@store')->name('users.store')->middleware('can:user-create');
            Route::get('/{id}/edit', 'UserController@edit')->name('users.edit')->middleware('can:user-edit');
            Route::patch('/{id}/edit', 'UserController@update')->name('users.update')->middleware('can:user-edit');
            Route::delete('/{id}/delete', 'UserController@destroy')->name('users.destroy')->middleware('can:user-delete');
        });


        // roles
        Route::prefix('roles')->group(function () {
            Route::get('/', 'RoleController@index')->name('roles.index')->middleware('can:role-view');
            Route::get('/create', 'RoleController@create')->name('roles.create')->middleware('can:role-create');
            Route::post('/create', 'RoleController@store')->name('roles.store')->middleware('can:role-create');
            Route::get('/{id}/edit', 'RoleController@edit')->name('roles.edit')->middleware('can:role-edit');
            Route::patch('/{id}/edit', 'RoleController@update')->name('roles.update');
            Route::delete('/{id}/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('can:role-delete');

            // role permissions
            Route::get('/{id}', 'RoleController@show')->name('roles.show')->middleware('can:rolepermission-view');
            Route::post('/{id}/permission', 'RoleController@permissionsUpdate')->name('roles.permissions-update')->middleware('can:rolepermission-update');
        });

        // permissions
        Route::prefix('permissions')->group(function () {
            Route::get('/', 'PermissionController@index')->name('permissions.index')->middleware('can:permission-view');
            Route::get('/create', 'PermissionController@create')->name('permissions.create')->middleware('can:permission-create');
            Route::post('/create', 'PermissionController@store')->name('permissions.store')->middleware('can:permission-create');
            Route::get('/{id}/edit', 'PermissionController@edit')->name('permissions.edit')->middleware('can:permission-edit');
            Route::patch('/{id}/edit', 'PermissionController@update')->name('permissions.update')->middleware('can:permission-edit');
            Route::delete('/{id}/delete', 'PermissionController@destroy')->name('permissions.destroy')->middleware('can:permission-delete');
        });

        // products
        Route::resource('products', ProductController::class);

        // purchase-orders
        Route::resource('purchase-orders', PurchaseOrderController::class);

        // tugas 11
        Route::get('/tugas11', 'Tugas11Controller@index')->name('tugas11.index');
        Route::post('/tugas11', 'Tugas11Controller@purchaseOrderJson')->name('tugas11.purchase-order-json');
    });
});
