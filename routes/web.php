<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('dashboard');
});

require __DIR__ . '/auth.php';


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});


//For Owner
Route::group(['middleware' => ['auth', 'role:owner']], function () {


    //Admin Side Nav Route
    Route::get('owner', 'App\Http\Controllers\Owner\DashboardController@index')->name('dashboard');


    Route::get('owner/area', 'App\Http\Controllers\Owner\AreaController@index')->name('area');
    Route::post('owner/area', 'App\Http\Controllers\Owner\AreaController@add_area')->name('add_area');
    Route::get('owner/area/delete/{id}', 'App\Http\Controllers\Owner\AreaController@delete_area')->name('delete_area');

    Route::post('owner/vicinity', 'App\Http\Controllers\Owner\AreaController@add_vicinity')->name('add_vicinity');
    Route::get('owner/vicinity/delete/{id}', 'App\Http\Controllers\Owner\AreaController@delete_vicinity')->name('delete_vicinity');
    

    Route::get('owner/subscriber', 'App\Http\Controllers\Owner\SubscriberController@index')->name('subscriber');
    Route::post('owner/subscriber', 'App\Http\Controllers\Owner\SubscriberController@filter')->name('filter');  
    Route::post('owner/subscriber/settle_due', 'App\Http\Controllers\Owner\SubscriberController@settle_due')->name('settle_due'); 
    Route::post('owner/subscriber/store', 'App\Http\Controllers\Owner\SubscriberController@store')->name('add_subscriber');
    Route::get('owner/subscriber/getVicinity/{id}', 'App\Http\Controllers\Owner\SubscriberController@getVicinity')->name('getVicinity');
    Route::get('owner/subscriber/{id}', 'App\Http\Controllers\Owner\SubscriberController@view')->name('view_subscriber');
    Route::get('owner/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Owner\SubscriberController@cut_lock_fund')->name('cut_lock_fund');
    Route::get('owner/subscriber/billing/{id}', 'App\Http\Controllers\Owner\SubscriberController@subscriber_bills')->name('subscriber_bills');

  
    Route::get('owner/billing', 'App\Http\Controllers\Owner\BillingController@index')->name('billing');
    Route::post('owner/billing', 'App\Http\Controllers\Owner\BillingController@filter')->name('filter');  
    Route::get('owner/billing/generate', 'App\Http\Controllers\Owner\BillingController@generate')->name('generate');
    Route::post('owner/billing/update', 'App\Http\Controllers\Owner\BillingController@update')->name('update');
    Route::get('owner/billing/billcollection', 'App\Http\Controllers\Owner\BillingController@billcollection')->name('billcollection');


    
    Route::get('owner/memo', 'App\Http\Controllers\Owner\MemoController@index')->name('account');
    Route::post('owner/memo', 'App\Http\Controllers\Owner\MemoController@store')->name('store');
    Route::get('owner/memo/{id}', 'App\Http\Controllers\Owner\MemoController@view')->name('view');


    Route::get('owner/account', 'App\Http\Controllers\Owner\AccountController@index')->name('account');


    //User Route
    Route::get('owner/profile', 'App\Http\Controllers\Owner\UserController@admin_profile')->name('profile');
    Route::post('owner/profile/update', 'App\Http\Controllers\Owner\UserController@admin_profile_update')->name('update_profile');


    //Users Route
    Route::get('owner/users', 'App\Http\Controllers\Owner\UserController@users')->name('users');
    Route::post('owner/users/add', 'App\Http\Controllers\Owner\UserController@add_users')->name('add_users');
    Route::get('owner/users/view/{id}', 'App\Http\Controllers\Owner\UserController@view_users')->name('view_users');
    Route::post('owner/users/update', 'App\Http\Controllers\Owner\UserController@update_users')->name('edit_users');
    Route::get('owner/users/delete/{id}', 'App\Http\Controllers\Owner\UserController@delete_users')->name('delete_users');
    Route::post('owner/users/upload_image', 'App\Http\Controllers\Owner\UserController@upload_image')->name('upload_image');

    Route::get('owner/sallery','App\Http\Controllers\Owner\SalleryController@index')->name('sallery');
    Route::post('owner/sallery/add','App\Http\Controllers\Owner\SalleryController@add_sallery')->name('add_sallery');
    Route::post('owner/sallery/filter','App\Http\Controllers\Owner\SalleryController@filter')->name('filter_sallery');
    Route::get('owner/sallery/settle/{id}','App\Http\Controllers\Owner\SalleryController@settle')->name('settle_sallery');
   
});




//For manager
Route::group(['middleware' => ['auth', 'role:manager']], function () {


    //Admin Side Nav Route
    Route::get('manager', 'App\Http\Controllers\Manager\DashboardController@index')->name('dashboard');


    Route::get('manager/area', 'App\Http\Controllers\Manager\AreaController@index')->name('area');
    Route::post('manager/area', 'App\Http\Controllers\Manager\AreaController@add_area')->name('add_area');
    Route::get('manager/area/delete/{id}', 'App\Http\Controllers\Manager\AreaController@delete_area')->name('delete_area');

    Route::post('manager/vicinity', 'App\Http\Controllers\Manager\AreaController@add_vicinity')->name('add_vicinity');
    Route::get('manager/vicinity/delete/{id}', 'App\Http\Controllers\Manager\AreaController@delete_vicinity')->name('delete_vicinity');
    

    Route::get('manager/subscriber', 'App\Http\Controllers\Manager\SubscriberController@index')->name('subscriber');
    Route::post('manager/subscriber', 'App\Http\Controllers\Manager\SubscriberController@filter')->name('filter');  
    Route::post('manager/subscriber/settle_due', 'App\Http\Controllers\Manager\SubscriberController@settle_due')->name('settle_due'); 
    Route::post('manager/subscriber/store', 'App\Http\Controllers\Manager\SubscriberController@store')->name('add_subscriber');
    Route::get('manager/subscriber/getVicinity/{id}', 'App\Http\Controllers\Manager\SubscriberController@getVicinity')->name('getVicinity');
    Route::get('manager/subscriber/{id}', 'App\Http\Controllers\Manager\SubscriberController@view')->name('view_subscriber');
    Route::get('manager/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Manager\SubscriberController@cut_lock_fund')->name('cut_lock_fund');
    Route::get('manager/subscriber/billing/{id}', 'App\Http\Controllers\Manager\SubscriberController@subscriber_bills')->name('subscriber_bills');

  
    Route::get('manager/billing', 'App\Http\Controllers\Manager\BillingController@index')->name('billing');
    Route::post('manager/billing', 'App\Http\Controllers\Manager\BillingController@filter')->name('filter');  
    Route::get('manager/billing/generate', 'App\Http\Controllers\Manager\BillingController@generate')->name('generate');
    Route::post('manager/billing/update', 'App\Http\Controllers\Manager\BillingController@update')->name('update');
    Route::get('manager/billing/billcollection', 'App\Http\Controllers\Manager\BillingController@billcollection')->name('billcollection');


    

    Route::get('manager/memo', 'App\Http\Controllers\Manager\MemoController@index')->name('account');
    Route::post('manager/memo', 'App\Http\Controllers\Manager\MemoController@store')->name('store');
    Route::get('manager/memo/{id}', 'App\Http\Controllers\Manager\MemoController@view')->name('view');


    Route::get('manager/account', 'App\Http\Controllers\Manager\AccountController@index')->name('account');


    //User Route
    Route::get('manager/profile', 'App\Http\Controllers\Manager\UserController@admin_profile')->name('profile');
    Route::post('manager/profile/update', 'App\Http\Controllers\Manager\UserController@admin_profile_update')->name('update_profile');

    

    //Users Route
    Route::get('manager/users', 'App\Http\Controllers\Manager\UserController@users')->name('users');
    Route::post('manager/users/add', 'App\Http\Controllers\Manager\UserController@add_users')->name('add_users');
    Route::get('manager/users/view/{id}', 'App\Http\Controllers\Manager\UserController@view_users')->name('view_users');
    Route::post('manager/users/update', 'App\Http\Controllers\Manager\UserController@update_users')->name('edit_users');
    Route::get('manager/users/delete/{id}', 'App\Http\Controllers\Manager\UserController@delete_users')->name('delete_users');
    Route::post('manager/users/upload_image', 'App\Http\Controllers\Manager\UserController@upload_image')->name('upload_image');
   
});


//For Employee
Route::group(['middleware' => ['auth', 'role:employee']], function () {

    Route::get('employee', 'App\Http\Controllers\Employee\BillingController@index')->name('billcollection');
    Route::post('employee/billing/update', 'App\Http\Controllers\Employee\BillingController@update')->name('update');


    Route::get('employee/subscriber', 'App\Http\Controllers\Employee\SubscriberController@index')->name('subscriber');
    Route::post('employee/subscriber', 'App\Http\Controllers\Employee\SubscriberController@filter')->name('filter');  
    Route::get('employee/subscriber/{id}', 'App\Http\Controllers\Employee\SubscriberController@view')->name('view_subscriber');
    Route::get('employee/subscriber/getVicinity/{id}', 'App\Http\Controllers\Employee\SubscriberController@getVicinity')->name('getVicinity');
    Route::get('employee/subscriber/billing/{id}', 'App\Http\Controllers\Employee\SubscriberController@subscriber_bills')->name('subscriber_bills');
    Route::get('employee/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Employee\SubscriberController@cut_lock_fund')->name('cut_lock_fund');


    Route::get('employee/memo', 'App\Http\Controllers\Employee\MemoController@index')->name('account');
    Route::post('employee/memo', 'App\Http\Controllers\Employee\MemoController@store')->name('store');
    Route::get('employee/memo/{id}', 'App\Http\Controllers\Employee\MemoController@view')->name('view');

});


