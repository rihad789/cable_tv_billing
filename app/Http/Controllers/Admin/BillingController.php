<?php

namespace App\Http\Controllers\Admin;

use App\Models\billing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Billings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BillingController extends Controller
{

    public function index()
    {
        //
        $billingData = DB::table("billings")->get();
        $subscribersData = DB::table("subscribers")->select('client_id', 'client_name')->where('connection_status','=',1)->get();

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $monthly_billing = DB::table("billings")->select('bill_amount','billing_status')
        ->where('bill_month',"=",$month)
        ->where('bill_year',"=",$year)
        ->get();

        $totalBilling = DB::table("billings")->select('bill_amount')->get();

        $total_bill=0;

        foreach ($totalBilling as $item) {
            $total_bill=$total_bill+$item->bill_amount;
        }

        $total_this_month=0;
        $paid_this_month=0;

        foreach ($monthly_billing as $item) {

            if($item->billing_status=="1")
            {
                $paid_this_month=$paid_this_month+$item->bill_amount;
            }

            $total_this_month=$total_this_month+$item->bill_amount;

        }

        return view('admin.billing', compact('billingData', 'subscribersData','total_bill','total_this_month','paid_this_month')); 
    }

    public function filter(Request $request)
    {


        $billing_time=$request->billing_time;

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;
        $billingData="";

       // $billingData=DB::select(DB::raw("SELECT * FROM `billings` WHERE bill_year='2021' AND bill_month='10' AND billing_status=0; "));

        if($billing_time=="1" && $request->billing_status != null )
        {
            $billingData=DB::select(DB::raw("SELECT * FROM billings WHERE bill_year= '$year' AND bill_month='$month' AND billing_status=$request->billing_status;"));
        }
        else if($billing_time=="1" && $request->billing_status == null )
        {
            $billingData=DB::select(DB::raw("SELECT * FROM billings WHERE bill_year= '$year' AND bill_month='$month';"));
        }
        else if($billing_time=="2" && $request->billing_status != null )
        {
            $month=$month-1;
            $billingData=DB::select(DB::raw("SELECT * FROM billings WHERE bill_year= '$year' AND bill_month='$month' AND billing_status=$request->billing_status;"));
        }
        else if($billing_time=="2" && $request->billing_status == null )
        {
            $month=$month-1;
            $billingData=DB::select(DB::raw("SELECT * FROM `billings` WHERE bill_year= '$year' AND bill_month='$month';"));
        }
        else if($billing_time=="3" && $request->billing_status != null )
        {
            $billingData=DB::select(DB::raw("SELECT * FROM `billings` WHERE billing_status=$request->billing_status;"));
        }
        else if($billing_time=="3" && $request->billing_status == null )
        {
            $billingData = DB::table("billings")->get();
        }
        else
        {
            $billingData = DB::table("billings")->where('billing_status','=',$request->billing_status)->get();
        }
  
        $subscribersData = DB::table("subscribers")->select('client_id', 'client_name')->where('connection_status','=',1)->get();

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $monthly_billing = DB::table("billings")->select('bill_amount','billing_status')
        ->where('bill_month',"=",$month)
        ->where('bill_year',"=",$year)
        ->get();

        $totalBilling = DB::table("billings")->select('bill_amount')->get();

        $total_bill=0;

        foreach ($totalBilling as $item) {
            $total_bill=$total_bill+$item->bill_amount;
        }

        $total_this_month=0;
        $paid_this_month=0;

        foreach ($monthly_billing as $item) {

            if($item->billing_status=="1")
            {
                $paid_this_month=$paid_this_month+$item->bill_amount;
            }

            $total_this_month=$total_this_month+$item->bill_amount;

        }

        return view('admin.billing', compact('billingData', 'subscribersData','total_bill','total_this_month','paid_this_month')); 


    //return response()->json(['Response'=>$billingData.$month.$year.$month-1]);

    }

    public function generate()
    {
        //
        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $subscriberData = DB::table("subscribers")->select('client_id', 'client_name')->where('connection_status','=',1)->get()->toArray();
        $countSubscriber = DB::table("subscribers")->count();

        if ($countSubscriber == 0) {
            return redirect('admin/billing')->with('error', trans("অনুগ্রহ করে আগে গ্রাহক যোগ করুন।"));
        } else {
            foreach ($subscriberData as $item) {

                $clientCount = DB::table("billings")
                    ->where('client_id', "=", $item->client_id)
                    ->where('bill_month', '=', $month)
                    ->where('bill_year', '=', $year)
                    ->count();

                $billAmount=DB::table("subscribers")->select("subscribers.bill_amount")->where('client_id', "=", $item->client_id) ->first();

                $bill = "150";

                if ($clientCount === 0) {

                    $subscriber = Billings::create([
                        'client_id' => $item->client_id,
                        'client_name' => $item->client_name,
                        'bill_month' => $month,
                        'bill_year' => $year,
                        'bill_amount' => $billAmount->bill_amount,
                        'billing_status' => false,
                    ]);
                }
            }

            return redirect('admin/billing')->with('success', trans("বিল জেনারেট সম্পন্ন হয়েছে।"));
        }
    }

    public function update(Request $request)
    {
        //
        $updated_by = auth()->user()->first_name . " " . auth()->user()->last_name;

        $billing_status = $request->billing_status;
        $updated_by = $updated_by;

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $checkBill = DB::table("billings")
            ->select('billing_status')
            ->where('client_id', "=", $request->client_id)
            ->where('bill_month', '=', $month)
            ->where('bill_year', '=', $year)
            ->first();

        if ($checkBill->billing_status == "1") {
            return redirect('admin/billing')->with('success', trans("বিল পুর্বেই আপডেট করা হয়েছে"));
        } else {

            $affectedRow = Billings::where('client_id', $request->client_id)
                ->update(['billing_status' => $billing_status, "billing_date" => $timestamp, "updated_by" => $updated_by]);

            if ($affectedRow == 1) {
                return redirect('admin/billing')->with('success', trans("বিল আইডেট সম্পুর্ন হয়েছে"));
            }
        }


        // //return response()->json($request->client_id,$request->billing_status);
        // return response()->json(['Client_id'=>$request->client_id,"billing_status"=>$request->billing_status]);

    }

}
