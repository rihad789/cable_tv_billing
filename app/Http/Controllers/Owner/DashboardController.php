<?php

namespace App\Http\Controllers\Owner;

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

        //if($month.strlen(1)) {  $month="0".$month; }

        $dateTime=$year."-".$month;

        //Retrieving Total Subscriber Count for all time.
        $subTotal=DB::table("subscribers")->count();

        //Retrieving Subscriber Count for this year
        $subYear=DB::table("subscribers")->where("created_at", "like", "$year%")->count();

        //Retrieving Subscriber Count for this Month
        $subMonth=DB::table("subscribers")->where("created_at", "like", "$dateTime%")->count();

        //Retrieving Subscriber Count for today
        $subToday=DB::table("subscribers")->where("created_at", "like", "$timestamp%")->count();


        $billMonth = Carbon::parse($timestamp)->month;

        $totalBilling = DB::table("billings")->select('bill_amount')->get();

        $total_bill=0;

        foreach ($totalBilling as $item) {
            $total_bill=$total_bill+$item->bill_amount;
        }

        $total_this_month=0;
        $paid_this_month=0;

        $monthly_billing = DB::table("billings")->select('bill_amount','billing_status')
        ->where('bill_month',"=",$billMonth)
        ->where('bill_year',"=",$year)
        ->get();

        foreach ($monthly_billing as $item) {

            if($item->billing_status=="1")
            {
                $paid_this_month=$paid_this_month+$item->bill_amount;
            }

            $total_this_month=$total_this_month+$item->bill_amount;
        }

        $due_this_month=$total_this_month-$paid_this_month;

        return view('owner.dashboard',compact('subTotal','subToday','subMonth','subYear','total_bill','total_this_month','paid_this_month','due_this_month'));

        //return response()->json(['Response:'=>$total_this_month.$paid_this_month.$due_this_month.','.$month]);
    }


}