<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// bắt buộc người dùng phải xác nhận email khi đăng kí thì mới vào được trang home
Route::get('/home', 'HomeController@index')->name('home')->middleware(['verified']);

// Route::get('/dashboard', 'AdmintratorController@show')->name('dashboard')->middleware('auth', 'checkRole');
// Route::get('/dashboard/user/list', 'UserController@show')->name('users.list')->middleware('auth', 'checkRole');

// Route::get('/dashboard/user/add', 'UserController@add')->name('users.add')->middleware('auth', 'checkRole');
// Route::post('/dashboard/user/store', 'UserController@store')->name('users.store')->middleware('auth', 'checkRole');


Route::middleware(['auth', 'checkRole'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'AdmintratorController@show')->name('dashboard');

        Route::get('user/list', 'UserController@show')->name('users.list');
        Route::get('user/add', 'UserController@add')->name('users.add');
        Route::post('user/store', 'UserController@store')->name('users.store');
        
        Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('user/update/{id}', 'UserController@update')->name('user.update');

        Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
        Route::get('user/action', 'UserController@action')->name('users.action');
    });
});
