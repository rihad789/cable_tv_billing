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

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
});


Route::group(['middleware' => ['auth', 'role:owner']], function () {

    //Employee Route
    Route::get('employee', 'App\Http\Controllers\App\EmployeeController@index');
    Route::post('employee/add', 'App\Http\Controllers\App\EmployeeController@add_employee');
    Route::get('employee/{id}', 'App\Http\Controllers\App\EmployeeController@view_employee');
    Route::post('employee/update', 'App\Http\Controllers\App\EmployeeController@update_employee');
    Route::get('employee/delete/{id}', 'App\Http\Controllers\App\EmployeeController@delete_employee');
    Route::post('employee/upload_image', 'App\Http\Controllers\App\EmployeeController@upload_employee_image');
});


//For Owner
Route::group(['middleware' => ['auth', 'role:owner|manager']], function () {

    //Dashboard Routes
    Route::get('dashboard', 'App\Http\Controllers\App\DashboardController@index');

    //Area and Vicinity Routes
    Route::get('area', 'App\Http\Controllers\App\AreaController@area');
    Route::post('area/add', 'App\Http\Controllers\App\AreaController@add_area');
    Route::get('area/delete/{id}', 'App\Http\Controllers\App\AreaController@delete_area');

    //Area and Vicinity Routes
    Route::get('vicinity', 'App\Http\Controllers\App\AreaController@vicinity');
    Route::post('vicinity/add', 'App\Http\Controllers\App\AreaController@add_vicinity');
    Route::get('vicinity/delete/{id}', 'App\Http\Controllers\App\AreaController@delete_vicinity');

    //Memo Routes
    Route::get('memo', 'App\Http\Controllers\App\MemoController@index');
    Route::get('memo/add', 'App\Http\Controllers\App\MemoController@add_memo_form');
    Route::post('memo/add', 'App\Http\Controllers\App\MemoController@add_memo_op');
    Route::get('memo/history', 'App\Http\Controllers\App\MemoController@memo_history');
    Route::get('memo/{id}', 'App\Http\Controllers\App\MemoController@view_memo');

    //Account Diary Controller
    Route::get('account_diary', 'App\Http\Controllers\App\AccountController@index');
    Route::post('account_diary/settle_account', 'App\Http\Controllers\App\AccountController@settle_account');
    Route::get('account_diary/settlements', 'App\Http\Controllers\App\AccountController@settlements');

    //Profile Route
    Route::get('my_profile', 'App\Http\Controllers\App\ProfileController@my_profile');
    Route::post('my_profile/update_profile', 'App\Http\Controllers\App\ProfileController@update_profile');
    Route::get('my_account', 'App\Http\Controllers\App\ProfileController@my_account');
    Route::post('my_account/update', 'App\Http\Controllers\App\ProfileController@update_account');
    Route::post('my_account/update_password', 'App\Http\Controllers\App\ProfileController@update_password');


    //Employee Sallery Route
    Route::get('sallery', 'App\Http\Controllers\App\SalleryController@index');
    Route::post('sallery/add', 'App\Http\Controllers\App\SalleryController@add_sallery');
    Route::get('sallery/settle/{id}', 'App\Http\Controllers\App\SalleryController@settle');
});


//For Owner
Route::group(['middleware' => ['auth', 'role:owner|manager|employee']], function () {


    //Subscriber Routes
    Route::get('subscriber/search', 'App\Http\Controllers\App\SubscriberController@search_body');
    Route::get('subscriber/search/{id}', 'App\Http\Controllers\App\SubscriberController@search_result');
    Route::get('subscriber', 'App\Http\Controllers\App\SubscriberController@index');
    Route::post('subscriber/add', 'App\Http\Controllers\App\SubscriberController@add_subscriber');
    Route::get('subscriber/getVicinity/{id}', 'App\Http\Controllers\App\SubscriberController@getVicinity');
    Route::get('subscriber/{id}', 'App\Http\Controllers\App\SubscriberController@view_subscriber');
    Route::post('subscriber/settle_due', 'App\Http\Controllers\App\SubscriberController@settle_due');
    Route::get('subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\App\SubscriberController@cut_lock_fund');
    Route::get('subscriber/billing/{id}', 'App\Http\Controllers\App\SubscriberController@subscriber_bills');

    //Billing Routes
    Route::get('billing', 'App\Http\Controllers\App\BillingController@index');
    Route::post('billing', 'App\Http\Controllers\App\BillingController@filter_billing');
    Route::get('billing/generate', 'App\Http\Controllers\App\BillingController@generate_bills');
    Route::post('billing/collect_bills', 'App\Http\Controllers\App\BillingController@collect_bills');
    Route::get('billing/bill_collection', 'App\Http\Controllers\App\BillingController@billcollection');
    Route::get('billing/collect_collection/{id}', 'App\Http\Controllers\App\BillingController@collect_collection');

    //Memo Routes
    Route::get('memo', 'App\Http\Controllers\App\MemoController@index');
    Route::get('memo/add', 'App\Http\Controllers\App\MemoController@add_memo_form');
    Route::post('memo/add', 'App\Http\Controllers\App\MemoController@add_memo_op');
    Route::get('memo/history', 'App\Http\Controllers\App\MemoController@memo_history');
    Route::get('memo/{id}', 'App\Http\Controllers\App\MemoController@view_memo');
});
