<?php

namespace App\Http\Controllers\Owner;

use App\Models\Sallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SalleryController extends Controller
{

    public function index()
    {
        //
        $salleryData = DB::select(DB::raw("select salleries.id,salleries.user_id,users.first_name,users.last_name,salleries.sallery_month,
            salleries.sallery_year,salleries.sallery_amount,salleries.payment_status from users 
            inner join salleries on users.id=salleries.user_id;"));

        $userEmail = Auth::user()->email;

        $userData = DB::select(DB::raw("select users.id,users.phone,users.first_name,users.last_name,roles.display_name from users 
            INNER JOIN role_user on role_user.user_id=users.id INNER JOIN roles on roles.id=role_user.role_id where NOT users.email='$userEmail'"));


        return view('owner.sallery', compact('salleryData', 'userData'));
    }

    public function add_sallery(Request $request)
    {
        //
        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $salleryCount = DB::table("salleries")->where('user_id', "=", $request->employee_id)->count();

        if ($salleryCount == 0) {

            $sallery = Sallery::create([

                'user_id' => $request->employee_id,
                'sallery_month' => $month,
                'sallery_year' => $year,
                'sallery_amount' => $request->sallery,
                'payment_status' => false,

            ]);

            return redirect('owner/sallery')->with('success', trans("Sallery Added Successfully"));
        } else {
            $payment_status = DB::table("salleries")->where('user_id', "=", $request->employee_id)->select('payment_status')->first();

            if ($payment_status->payment_status == 1) {


                $current_sallery_count = DB::table("salleries")
                    ->where('user_id', "=", $request->employee_id)
                    ->where('sallery_month', '=', $month)
                    ->where('sallery_year', '=', $year)
                    ->count();

                if ($current_sallery_count == 1) {
                    return redirect('owner/sallery')->with('success', trans("Current Month Sallery Already Added"));
                } else {
                    $sallery = Sallery::create([

                        'user_id' => $request->employee_id,
                        'sallery_month' => $month,
                        'sallery_year' => $year,
                        'sallery_amount' => $request->sallery,
                        'payment_status' => false,

                    ]);
                }


                return redirect('owner/sallery')->with('success', trans("Sallery Updated Successfully"));
            } else {
                return redirect('owner/sallery')->with('error', trans("Sorry ,Previous Sallery Due"));
            }
        }
    }


    public function filter(Request $request)
    {

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;
        $salleryData = "";

        $sallery_time = $request->sallery_time;

        // $billingData=DB::select(DB::raw("SELECT * FROM `billings` WHERE bill_year='2021' AND bill_month='10' AND billing_status=0; "));

        if ($sallery_time == "1") {
            $salleryData = DB::select(DB::raw("select salleries.id,salleries.user_id,users.first_name,users.last_name,salleries.sallery_month,salleries.sallery_year,salleries.sallery_amount,salleries.payment_status from users 
            inner join salleries on users.id=salleries.user_id where salleries.sallery_month = $month and salleries.sallery_year =  $year;"));
        } else if ($sallery_time == "2") {
            $month = $month - 1;
            $salleryData = DB::select(DB::raw("select salleries.id, salleries.user_id,users.first_name,users.last_name,salleries.sallery_month,salleries.sallery_year,salleries.sallery_amount,salleries.payment_status from users 
            inner join salleries on users.id=salleries.user_id where salleries.sallery_month = $month and salleries.sallery_year =  $year;"));
        } else if ($sallery_time == "3") {
            $salleryData = DB::select(DB::raw("select salleries.id,salleries.user_id,users.first_name,users.last_name,salleries.sallery_month,salleries.sallery_year,salleries.sallery_amount,salleries.payment_status from users 
            inner join salleries on users.id=salleries.user_id;"));
        } else {
            $salleryData = DB::select(DB::raw("select salleries.id,salleries.user_id,users.first_name,users.last_name,salleries.sallery_month,salleries.sallery_year,salleries.sallery_amount,salleries.payment_status from users 
            inner join salleries on users.id=salleries.user_id;"));
        }


        $userPhone = Auth::user()->phone;

        $userData = DB::select(DB::raw("select users.id,users.phone,users.first_name,users.last_name,roles.display_name from users 
        INNER JOIN role_user on role_user.user_id=users.id INNER JOIN roles on roles.id=role_user.role_id where NOT users.phone='$userPhone'"));


        return view('owner.sallery', compact('salleryData', 'userData'));
    }


    public function settle($id)
    {

        $affectedRow = Sallery::where('id', '=', $id)->update(['payment_status' => 1]);

        // return response()->json(['Response'=>$id]);

        return redirect('owner/sallery')->with('success', trans("Employee sallery settled sucessfully"));
    }
}
