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


//For admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {


    //Admin Side Nav Route
    Route::get('admin', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');


    Route::get('admin/area', 'App\Http\Controllers\Admin\AreaController@index')->name('area');
    Route::post('admin/area/store', 'App\Http\Controllers\Admin\AreaController@add_area')->name('add_area');
    Route::post('admin/vicinity/store', 'App\Http\Controllers\Admin\AreaController@add_vicinity')->name('add_vicinity');

    
    Route::get('admin/subscriber', 'App\Http\Controllers\Admin\SubscriberController@index')->name('subscriber');
    Route::post('admin/subscriber/store', 'App\Http\Controllers\Admin\SubscriberController@store')->name('add_subscriber');
    Route::get('admin/subscriber/getVicinity/{id}', 'App\Http\Controllers\Admin\SubscriberController@getVicinity')->name('getVicinity');
    Route::get('admin/subscriber/view/{id}', 'App\Http\Controllers\Admin\SubscriberController@view')->name('view');


    Route::get('admin/billing', 'App\Http\Controllers\Admin\BillingController@index')->name('billing');
    Route::get('admin/billing/generate', 'App\Http\Controllers\Admin\BillingController@generate')->name('generate');
    Route::post('admin/billing/update', 'App\Http\Controllers\Admin\BillingController@update')->name('update');

    Route::get('admin/memo', 'App\Http\Controllers\Admin\MemoController@index')->name('account');
    Route::post('admin/memo/store', 'App\Http\Controllers\Admin\MemoController@store')->name('store');
    Route::get('admin/memo/view/{id}', 'App\Http\Controllers\Admin\MemoController@view')->name('view');

    Route::get('admin/settings', 'App\Http\Controllers\Admin\SettingsController@index')->name('settings');

    
   
});


//For Operator
Route::group(['middleware' => ['auth', 'role:operator']], function () {


    //Operator Side Nav Route
    Route::get('operator', 'App\Http\Controllers\Operator\DashboardController@index')->name('dashboard');
    Route::get('operator/complaint', 'App\Http\Controllers\Operator\DashboardController@complaint')->name('complaint');
    Route::get('operator/metrocard', 'App\Http\Controllers\Operator\DashboardController@metrocard')->name('metrocard');


    //Metro Card Route
    Route::post('operator/metrocard/register', 'App\Http\Controllers\Operator\MetroCardController@register_metro_card_user')->name('register');
    Route::get('operator/metrocard/view/{id}', 'App\Http\Controllers\Operator\MetroCardController@view_metro_card_user')->name('view');
    Route::post('operator/metrocard/issue_new_card', 'App\Http\Controllers\Operator\MetroCardController@issue_new_card')->name('issue');

    Route::get('operator/metrocard/viewCard', 'App\Http\Controllers\Operator\MetroCardController@view_metro_card')->name('viewCard');
    Route::post('operator/metrocard/updateCard', 'App\Http\Controllers\Operator\MetroCardController@update_metro_card')->name('updateCard');


    //Complaint Routes
    Route::get('operator/complaint/view/{id}', 'App\Http\Controllers\Operator\MetroCardController@view_complaint')->name('viewComplaint');
    Route::post('operator/complaint/update', 'App\Http\Controllers\Operator\MetroCardController@update_complaint_status')->name('updateComplaint');


    //User Route
    Route::get('operator/profile', 'App\Http\Controllers\Operator\UserController@index')->name('profile');
    Route::post('operator/profile/update', 'App\Http\Controllers\Operator\UserController@update_profile')->name('update');

    Route::get('operator/account', 'App\Http\Controllers\Operator\UserController@account')->name('account');
    Route::post('operator/account/update', 'App\Http\Controllers\Operator\UserController@update_operator_account')->name('update_operator_account');
    Route::post('operator/account/update_password', 'App\Http\Controllers\Operator\UserController@update_password')->name('update_password');
});


