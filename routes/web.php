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
    Route::get('owner', 'App\Http\Controllers\Owner\BillingController@billcollection');

    //Area and Vicinity Routes
    Route::get('owner/area', 'App\Http\Controllers\Owner\AreaController@area');
    Route::get('owner/vicinity', 'App\Http\Controllers\Owner\AreaController@vicinity');
    Route::post('owner/area/add', 'App\Http\Controllers\Owner\AreaController@add_area');
    Route::get('owner/area/delete/{id}', 'App\Http\Controllers\Owner\AreaController@delete_area');
    Route::post('owner/vicinity/add', 'App\Http\Controllers\Owner\AreaController@add_vicinity');
    Route::get('owner/vicinity/delete/{id}', 'App\Http\Controllers\Owner\AreaController@delete_vicinity');

    //Subscriber Routes

    Route::get('owner/subscriber/search', 'App\Http\Controllers\Owner\SubscriberController@search_body');
    Route::get('owner/subscriber/search/{id}', 'App\Http\Controllers\Owner\SubscriberController@search_result');

    Route::get('owner/subscriber', 'App\Http\Controllers\Owner\SubscriberController@index');
    Route::post('owner/subscriber/add', 'App\Http\Controllers\Owner\SubscriberController@add_subscriber');
    Route::get('owner/subscriber/getVicinity/{id}', 'App\Http\Controllers\Owner\SubscriberController@getVicinity');
    Route::get('owner/subscriber/{id}', 'App\Http\Controllers\Owner\SubscriberController@view_subscriber');



    Route::post('owner/subscriber/settle_due', 'App\Http\Controllers\Owner\SubscriberController@settle_due');
    Route::get('owner/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Owner\SubscriberController@cut_lock_fund');
    Route::get('owner/subscriber/billing/{id}', 'App\Http\Controllers\Owner\SubscriberController@subscriber_bills');


    //Billing Routes
    Route::get('owner/billing', 'App\Http\Controllers\Owner\BillingController@index');
    Route::post('owner/billing', 'App\Http\Controllers\Owner\BillingController@filter_billing');
    Route::get('owner/billing/generate', 'App\Http\Controllers\Owner\BillingController@generate_bills');
    Route::post('owner/billing/update', 'App\Http\Controllers\Owner\BillingController@update_bills');


    //Memo Routes

    Route::get('owner/memo', 'App\Http\Controllers\Owner\MemoController@index');
    Route::post('owner/memo', 'App\Http\Controllers\Owner\MemoController@add_memo');
    Route::get('owner/memo/{id}', 'App\Http\Controllers\Owner\MemoController@view_memo');
    Route::get('owner/memo/history', 'App\Http\Controllers\Owner\MemoController@memo_history');


    //Account Diary Controller
    Route::get('owner/account_diary', 'App\Http\Controllers\Owner\AccountController@index');
    Route::post('owner/account_diary/settle_account', 'App\Http\Controllers\Owner\AccountController@settle_account');
    Route::get('owner/account_diary/settlements', 'App\Http\Controllers\Owner\AccountController@settlements');


    //Profile Route
    Route::get('owner/my_profile', 'App\Http\Controllers\Owner\ProfileController@my_profile');
    Route::post('owner/my_profile/update_profile', 'App\Http\Controllers\Owner\ProfileController@update_profile');
    Route::post('owner/my_profile/upload_image', 'App\Http\Controllers\Owner\ProfileController@upload_image');

    Route::get('owner/my_account', 'App\Http\Controllers\Owner\ProfileController@my_account');
    Route::post('owner/my_account/update', 'App\Http\Controllers\Owner\ProfileController@update_account');
    Route::post('owner/my_account/update_password', 'App\Http\Controllers\Owner\ProfileController@update_password');


    //Employee Route
    Route::get('owner/employee', 'App\Http\Controllers\Owner\EmployeeController@index');
    Route::post('owner/employee/add', 'App\Http\Controllers\Owner\EmployeeController@add_employee');
    Route::get('owner/employee/{id}', 'App\Http\Controllers\Owner\EmployeeController@view_employee');
    Route::post('owner/employee/update', 'App\Http\Controllers\Owner\EmployeeController@update_employee');
    Route::get('owner/employee/delete/{id}', 'App\Http\Controllers\Owner\EmployeeController@delete_employee');
    Route::post('owner/employee/upload_image', 'App\Http\Controllers\Owner\EmployeeController@upload_employee_image');


    //Employee Sallery Route
    Route::get('employee-sallery', 'App\Http\Controllers\Owner\SalleryController@index');
    Route::post('owner/sallery/add', 'App\Http\Controllers\Owner\SalleryController@add_sallery');
    Route::get('owner/sallery/settle/{id}', 'App\Http\Controllers\Owner\SalleryController@settle');
});



//For Manager
Route::group(['middleware' => ['auth', 'role:manager']], function () {


    //Admin Side Nav Route
    Route::get('manager', 'App\Http\Controllers\Manager\BillingController@bill_collection');

    //Area and Vicinity Routes
    Route::get('manager/area_vicinity', 'App\Http\Controllers\Manager\AreaController@index');
    Route::post('manager/area/add', 'App\Http\Controllers\Manager\AreaController@add_area');
    Route::get('manager/area/delete/{id}', 'App\Http\Controllers\Manager\AreaController@delete_area');
    Route::post('manager/vicinity/add', 'App\Http\Controllers\Manager\AreaController@add_vicinity');
    Route::get('manager/vicinity/delete/{id}', 'App\Http\Controllers\Manager\AreaController@delete_vicinity');

    //Subscriber Routes
    Route::get('manager/subscriber', 'App\Http\Controllers\Manager\SubscriberController@index');
    Route::post('manager/subscriber', 'App\Http\Controllers\Manager\SubscriberController@filter_subscriber');
    Route::post('manager/subscriber/settle_due', 'App\Http\Controllers\Manager\SubscriberController@settle_due');
    Route::post('manager/subscriber/add', 'App\Http\Controllers\Manager\SubscriberController@add_subscriber');
    Route::get('manager/subscriber/getVicinity/{id}', 'App\Http\Controllers\Manager\SubscriberController@getVicinity');
    Route::get('manager/subscriber/{id}', 'App\Http\Controllers\Manager\SubscriberController@view_subscriber');
    Route::get('manager/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Manager\SubscriberController@cut_lock_fund');
    Route::get('manager/subscriber/billing/{id}', 'App\Http\Controllers\Manager\SubscriberController@subscriber_bills');


    //Billing Routes
    Route::get('manager/billing', 'App\Http\Controllers\Manager\BillingController@index');
    Route::post('manager/billing', 'App\Http\Controllers\Manager\BillingController@filter_billing');
    Route::get('manager/billing/generate', 'App\Http\Controllers\Manager\BillingController@generate_bills');
    Route::post('manager/billing/update', 'App\Http\Controllers\Manager\BillingController@update_bills');


    //Memo Routes
    Route::get('manager/memo/history', 'App\Http\Controllers\Manager\MemoController@memo_history');
    Route::get('manager/memo', 'App\Http\Controllers\Manager\MemoController@index');
    Route::post('manager/memo', 'App\Http\Controllers\Manager\MemoController@add_memo');
    Route::get('manager/memo/{id}', 'App\Http\Controllers\Manager\MemoController@view_memo');


    //Account Diary Controller
    Route::get('manager/account_diary', 'App\Http\Controllers\Manager\AccountController@index');
    Route::post('manager/account_diary/settle_account', 'App\Http\Controllers\Manager\AccountController@settle_account');
    Route::get('manager/account_diary/settlements', 'App\Http\Controllers\Manager\AccountController@settlements');


    //Profile Route
    Route::get('manager/my_profile', 'App\Http\Controllers\Manager\ProfileController@my_profile');
    Route::post('manager/my_profile/update_profile', 'App\Http\Controllers\Manager\ProfileController@update_profile');
    Route::post('manager/my_profile/upload_image', 'App\Http\Controllers\Manager\ProfileController@upload_image');

    Route::get('manager/my_account', 'App\Http\Controllers\Manager\ProfileController@my_account');
    Route::post('manager/my_account/update', 'App\Http\Controllers\Manager\ProfileController@update_account');
    Route::post('manager/my_account/update_password', 'App\Http\Controllers\Manager\ProfileController@update_password');
});




//For Employee
Route::group(['middleware' => ['auth', 'role:employee']], function () {


    //Admin Side Nav Route
    Route::get('employee', 'App\Http\Controllers\Employee\BillingController@bill_collection');

    //Area and Vicinity Routes
    Route::get('employee/area_vicinity', 'App\Http\Controllers\Employee\AreaController@index');
    Route::post('employee/area/add', 'App\Http\Controllers\Employee\AreaController@add_area');
    Route::get('employee/area/delete/{id}', 'App\Http\Controllers\Employee\AreaController@delete_area');
    Route::post('employee/vicinity/add', 'App\Http\Controllers\Employee\AreaController@add_vicinity');
    Route::get('employee/vicinity/delete/{id}', 'App\Http\Controllers\Employee\AreaController@delete_vicinity');

    //Subscriber Routes
    Route::get('employee/subscriber', 'App\Http\Controllers\Employee\SubscriberController@index');
    Route::post('employee/subscriber', 'App\Http\Controllers\Employee\SubscriberController@filter_subscriber');
    Route::post('employee/subscriber/add', 'App\Http\Controllers\Employee\SubscriberController@add_subscriber');
    Route::get('employee/subscriber/getVicinity/{id}', 'App\Http\Controllers\Employee\SubscriberController@getVicinity');
    Route::get('employee/subscriber/{id}', 'App\Http\Controllers\Employee\SubscriberController@view_subscriber');


    Route::post('employee/subscriber/settle_due', 'App\Http\Controllers\Employee\SubscriberController@settle_due');
    Route::get('employee/subscriber/cut_lock_fund/{id}', 'App\Http\Controllers\Employee\SubscriberController@cut_lock_fund');
    Route::get('employee/subscriber/billing/{id}', 'App\Http\Controllers\Employee\SubscriberController@subscriber_bills');


    //Billing Routes
    Route::get('employee/billing', 'App\Http\Controllers\Employee\BillingController@index');
    Route::post('employee/billing', 'App\Http\Controllers\Employee\BillingController@filter_billing');
    Route::get('employee/billing/generate', 'App\Http\Controllers\Employee\BillingController@generate_bills');
    Route::post('employee/billing/update', 'App\Http\Controllers\Employee\BillingController@update_bills');


    //Memo Routes
    Route::get('employee/memo/history', 'App\Http\Controllers\Employee\MemoController@memo_history');
    Route::get('employee/memo', 'App\Http\Controllers\Employee\MemoController@index');
    Route::post('employee/memo', 'App\Http\Controllers\Employee\MemoController@add_memo');
    Route::get('employee/memo/{id}', 'App\Http\Controllers\Employee\MemoController@view_memo');


    //Profile Route
    Route::get('employee/my_profile', 'App\Http\Controllers\Employee\ProfileController@my_profile');
    Route::post('employee/my_profile/update_profile', 'App\Http\Controllers\Employee\ProfileController@update_profile');
    Route::post('employee/my_profile/upload_image', 'App\Http\Controllers\Employee\ProfileController@upload_image');

    Route::get('employee/my_account', 'App\Http\Controllers\Employee\ProfileController@my_account');
    Route::post('employee/my_account/update', 'App\Http\Controllers\Employee\ProfileController@update_account');
    Route::post('employee/my_account/update_password', 'App\Http\Controllers\Employee\ProfileController@update_password');
});
