<?php

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

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registered', 'Auth\RegisterController@registered')->name('registered');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/contract/{email}', 'AdminController@contract')->name('admin.user.get.contract');
    Route::post('/contract', 'AdminController@updateContract')->name('admin.user.post.UpdateContract');
    Route::get('/bill/{email}', 'AdminController@bill')->name('admin.user.get.bill');
    Route::post('/bill/{email}/create', 'AdminController@addBill')->name('admin.user.post.addBill');
    Route::post('/bill', 'AdminController@updateBill')->name('admin.user.post.updateBill');
    Route::get('/measurement/{email}', 'AdminController@measurement')->name('admin.user.get.measurement');
});

Route::prefix('user')->group(function() {
    Route::get('/delete', 'UserController@delete')->name('user.get.delete');
    Route::get('/approve', 'UserController@approve')->name('user.get.approve');
    Route::post('/update', 'UserController@aupdate')->name('user.get.update');
    Route::get('/', 'UserController@index')->name('user.index');
});

Route::get('playground', function(){
    $faker = Faker\Factory::create();

    for($i=0; $i<50; $i++){
        $user = array('name' => $faker->name, 'email' => $faker->email, 'password' => \Hash::make('password'));
        User::create($user);
    }
});