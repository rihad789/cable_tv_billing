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
Route::group(['middleware' => ['auth', 'role:owner']], function () {


    //Admin Side Nav Route
    Route::get('admin', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');


    Route::get('admin/area', 'App\Http\Controllers\Admin\AreaController@index')->name('area');
    Route::post('admin/area', 'App\Http\Controllers\Admin\AreaController@add_area')->name('add_area');
    Route::get('admin/area/delete/{id}', 'App\Http\Controllers\Admin\AreaController@delete_area')->name('delete_area');

    Route::post('admin/vicinity', 'App\Http\Controllers\Admin\AreaController@add_vicinity')->name('add_vicinity');
    Route::get('admin/vicinity/delete/{id}', 'App\Http\Controllers\Admin\AreaController@delete_vicinity')->name('delete_vicinity');
    

    Route::get('admin/subscriber', 'App\Http\Controllers\Admin\SubscriberController@index')->name('subscriber');
    Route::post('admin/subscriber', 'App\Http\Controllers\Admin\SubscriberController@filter')->name('filter');  
    Route::post('admin/subscriber/store', 'App\Http\Controllers\Admin\SubscriberController@store')->name('add_subscriber');
    Route::get('admin/subscriber/getVicinity/{id}', 'App\Http\Controllers\Admin\SubscriberController@getVicinity')->name('getVicinity');
    Route::get('admin/subscriber/{id}', 'App\Http\Controllers\Admin\SubscriberController@view')->name('view_subscriber');
    Route::get('admin/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Admin\SubscriberController@cut_lock_fund')->name('cut_lock_fund');
    Route::get('admin/subscriber/billing/{id}', 'App\Http\Controllers\Admin\SubscriberController@billing')->name('billing');

  
    Route::get('admin/billing', 'App\Http\Controllers\Admin\BillingController@index')->name('billing');
    Route::post('admin/billing', 'App\Http\Controllers\Admin\BillingController@filter')->name('filter');  
    Route::get('admin/billing/generate', 'App\Http\Controllers\Admin\BillingController@generate')->name('generate');
    Route::post('admin/billing/update', 'App\Http\Controllers\Admin\BillingController@update')->name('update');
    Route::get('admin/billing/billcontection', 'App\Http\Controllers\Admin\BillingController@billcontection')->name('billcontection');


    

    Route::get('admin/memo', 'App\Http\Controllers\Admin\MemoController@index')->name('account');
    Route::post('admin/memo', 'App\Http\Controllers\Admin\MemoController@store')->name('store');
    Route::get('admin/memo/{id}', 'App\Http\Controllers\Admin\MemoController@view')->name('view');


    Route::get('admin/account', 'App\Http\Controllers\Admin\AccountController@index')->name('account');


    //User Route
    Route::get('admin/profile', 'App\Http\Controllers\Admin\UserController@admin_profile')->name('profile');
    Route::post('admin/profile/update', 'App\Http\Controllers\Admin\UserController@admin_profile_update')->name('update_profile');

    // Route::get('admin/account', 'App\Http\Controllers\Admin\UserController@admin_account')->name('account');
    // Route::post('admin/account/update', 'App\Http\Controllers\Admin\UserController@update_admin_account')->name('update_account');
    // Route::post('admin/account/update_password', 'App\Http\Controllers\Admin\UserController@admin_update_password')->name('update_password');


    //Users Route
    Route::get('admin/users', 'App\Http\Controllers\Admin\UserController@users')->name('users');
    Route::post('admin/users/add', 'App\Http\Controllers\Admin\UserController@add_users')->name('add_users');
    Route::get('admin/users/view/{id}', 'App\Http\Controllers\Admin\UserController@view_users')->name('view_users');
    Route::post('admin/users/update', 'App\Http\Controllers\Admin\UserController@update_users')->name('edit_users');
    Route::get('admin/users/delete/{id}', 'App\Http\Controllers\Admin\UserController@delete_users')->name('delete_users');
    Route::post('admin/users/upload_image', 'App\Http\Controllers\Admin\UserController@upload_image')->name('upload_image');
   
});


//For Operator
Route::group(['middleware' => ['auth', 'role:manager']], function () {


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


