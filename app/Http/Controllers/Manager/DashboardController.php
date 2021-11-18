<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Fares;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Complaints;


class DashboardController extends Controller
{
    //
    public function index()
    {

        $timestamp = Carbon::now()->toDateString();
        $year=Carbon::parse($timestamp)->year;
        $month=Carbon::parse($timestamp)->month;


        $dateTime=$year."-".$month;

        //Subscriber Dashboard

        $subTotal=DB::table("subscribers")->count();  //Retrieving Total Subscriber Count for all time.
        $subYear=DB::table("subscribers")->where("created_at", "like", "$year%")->count();  //Retrieving Subscriber Count for this year
        $subMonth=DB::table("subscribers")->where("created_at", "like", "$dateTime%")->count();  //Retrieving Subscriber Count for this Month
        $subToday=DB::table("subscribers")->where("created_at", "like", "$timestamp%")->count();  //Retrieving Subscriber Count for today



        //Sallery Dashboard

        $salleryData = DB::table("salleries")->select('sallery_amount','payment_status')->where('is_settled','=',false)->get();

        $totalEmployee=0;
        $totalSallery=0;
        $sallery_paid=0;
        $sallery_due=0;
        $sallery_status=0;

        foreach ($salleryData as $item) {

            $totalEmployee=$totalEmployee+1;
            $totalSallery=$totalSallery+$item->sallery_amount;

            if($item->payment_status)
            {
                $sallery_paid=$sallery_paid+$item->sallery_amount;
                $sallery_status=$sallery_status+1;

            }
            else
            {
                $sallery_status=false;
                $sallery_due=$sallery_due+$item->sallery_amount;
            }
        }

        //Billing dashboard

        $totalBilling = DB::table("billings")->select('billing_status','bill_amount')->get();

        $locked_fund=DB::table("subscribers")->where('is_settled','=',false)->sum('locked_fund');

        $total_bill=0;
        $bill_paid=0;
        $bill_due=0;

        foreach ($totalBilling as $item) {

            if($item->billing_status==1)
            {
                $bill_paid=$bill_paid+$item->bill_amount;
            }
            else
            {
                $bill_due=$bill_due+$item->bill_amount;
            }

            $total_bill=$total_bill+$item->bill_amount;
        }


        //Memo dashboard

        $memoTotal = DB::table("memos")->select('products_total','grand_amount')->where('is_settled','=',false)->get();
        $totalMemo = DB::table("memos")->where('is_settled','=',false)->count();

        $total_products=0;
        $grand_total=0;

        foreach ($memoTotal as $item) {
            $total_products=$total_products+$item->products_total;
            $grand_total=$grand_total+$item->grand_amount;
        }


        return view('manager.dashboard',compact('subTotal','subToday','subMonth','subYear','totalEmployee','totalSallery','sallery_paid','sallery_due','sallery_status','locked_fund','total_bill','bill_paid','bill_due','totalMemo','total_products','grand_total'));

        //return response()->json(['Response:'=>$total_this_month.$paid_this_month.$due_this_month.','.$month]);
    }



}
