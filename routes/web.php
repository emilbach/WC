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
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', 'WelcomeController@sendContact')->name('sendContact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/update', 'HomeController@updateUserInfo')->name('updateUserInfo');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/contract/{email}', 'AdminController@contract')->name('admin.user.get.contract');
    Route::post('/contract/{email}/create', 'AdminController@createContract')->name('admin.user.post.createContract');
    Route::post('/contract', 'AdminController@updateContract')->name('admin.user.post.UpdateContract');
    Route::get('/contract/{email}/delete', 'AdminController@deleteContract')->name('admin.user.deleteContract');
    Route::get('/bill/{email}', 'AdminController@bill')->name('admin.user.get.bill');
    Route::post('/bill/{email}/create', 'AdminController@addBill')->name('admin.user.post.addBill');
    Route::post('/bill', 'AdminController@updateBill')->name('admin.user.post.updateBill');
    Route::get('/bill/{email}/delete', 'AdminController@deleteBill')->name('admin.user.deleteBill');
    Route::get('/measurement/{email}', 'AdminController@measurement')->name('admin.user.get.measurement');
    Route::post('/measurement/{email}/create', 'AdminController@addMeasurement')->name('admin.user.post.addMeasurement');
    Route::post('/measurement', 'AdminController@updateMeasurement')->name('admin.user.post.updateMeasurement');
    Route::get('/measurement/{email}/delete', 'AdminController@deleteMeasurement')->name('admin.user.deleteMeasurement');
    Route::get('/contactdelete/{email}', 'AdminController@deleteContact')->name('admin.user.deleteContact');
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