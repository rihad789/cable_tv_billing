<?php

namespace App\Http\Controllers\Manager;

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

        $billingData = DB::table("billings")->get();      
        $subscribersData = DB::table("billings")->select('client_id', 'client_name')->where('bill_month',"=",$month)->where('billing_status','=', 0)->get();
        $monthly_billing = DB::table("billings")->select('bill_amount','billing_status')->where('bill_month',"=",$month)->where('bill_year',"=",$year)->get();

        $total_this_month=0;
        $paid_this_month=0;
        $due_this_month=0;
        $paid_today=0;
        

        foreach ($monthly_billing as $item) {

            if($item->billing_status=="1")
            {
                $paid_this_month=$paid_this_month+$item->bill_amount;
            }
            else           
            {
                $due_this_month=$due_this_month+$item->bill_amount;
            }
            $total_this_month=$total_this_month+$item->bill_amount;
        }

        
        $paidToday = DB::table("billings")->where('billing_date','like',$timestamp.'%')->where('billing_status','=', 1)->get();  

        foreach ($paidToday as $item) {

            $paid_today=$paid_today+$item->bill_amount;
        }

        $totalBilling = DB::table("billings")->select('bill_amount','billing_status')->get();

        $total_bill=0;
        $paid_bills=0;
        $due_bill=0;


        foreach ($totalBilling as $item) {

            if($item->billing_status==true)
            {
                $paid_bills=$paid_bills+$item->bill_amount;
            }
            else
            {
                $due_bill=$due_bill+$item->bill_amount;
            }
            $total_bill=$total_bill+$item->bill_amount;
        }

        return view('manager.billing', compact('billingData','paid_bills','due_bill','subscribersData','total_bill','paid_today','due_this_month','total_this_month','paid_this_month')); 
    }

    public function filter_billing(Request $request)
    {

        $billing_time=$request->billing_time;
        $billing_status=$request->billing_status;

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;
        $billingData="";

       // $billingData=DB::select(DB::raw("SELECT * FROM `billings` WHERE bill_year='2021' AND bill_month='10' AND billing_status=0; "));

        if($billing_time=="1" && $billing_status != null )
        {
            $billingData = DB::table("billings")->where('bill_year','=',$year)->where('bill_month','=',$month)->where('billing_status','=',$billing_status)->get();
        }
        else if($billing_time=="1" && $billing_status == null )
        {
            $billingData = DB::table("billings")->where('bill_year','=',$year)->where('bill_month','=',$month)->get();

        }
        else if($billing_time=="2" && $billing_status != null )
        {
            $month=$month-1;
            $billingData = DB::table("billings")->where('bill_year','=',$year)->where('bill_month','=',$month)->where('billing_status','=',$billing_status)->get();
        }
        else if($billing_time=="2" && $billing_status == null )
        {
            $month=$month-1;
            $billingData = DB::table("billings")->where('bill_year','=',$year)->where('bill_month','=',$month)->get();
        }
        else if($billing_time=="3" && $billing_status != null )
        {
            $billingData = DB::table("billings")->where('billing_status','=',$billing_status)->get();
        }
        else if($billing_time=="3" && $billing_status == null )
        {
            $billingData = DB::table("billings")->get();
        }
        else if($billing_time == null && $billing_status != null)
        {
            $billingData = DB::table("billings")->where('billing_status','=',$billing_status)->get();
        }
        else
        {
            $billingData = DB::table("billings")
            ->get();
        }

        $subscribersData = DB::table("subscribers")->select('client_id', 'client_name')->where('connection_status','=',1)->get();

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

     
        $subscribersData = DB::table("billings")->select('client_id', 'client_name')->where('bill_month',"=",$month)->where('billing_status','=', 0)->get();
        $monthly_billing = DB::table("billings")->select('bill_amount','billing_status')->where('bill_month',"=",$month)->where('bill_year',"=",$year)->get();

        $total_this_month=0;
        $paid_this_month=0;
        $due_this_month=0;
        $paid_today=0;
        

        foreach ($monthly_billing as $item) {

            if($item->billing_status=="1")
            {
                $paid_this_month=$paid_this_month+$item->bill_amount;
            }
            else           
            {
                $due_this_month=$due_this_month+$item->bill_amount;
            }

            $total_this_month=$total_this_month+$item->bill_amount;
        }

        
        $paidToday = DB::table("billings")->where('billing_date','like',$timestamp.'%')->where('billing_status','=', 1)->get();  

        foreach ($paidToday as $item) {

            $paid_today=$paid_today+$item->bill_amount;
        }

        $totalBilling = DB::table("billings")->select('bill_amount','billing_status')->get();

        $total_bill=0;
        $paid_bills=0;
        $due_bill=0;


        foreach ($totalBilling as $item) {

            if($item->billing_status==true)
            {
                $paid_bills=$paid_bills+$item->bill_amount;
            }
            else
            {
                $due_bill=$due_bill+$item->bill_amount;
            }
            $total_bill=$total_bill+$item->bill_amount;
        }

        return view('manager.billing', compact('billingData','paid_bills','due_bill','subscribersData','total_bill','paid_today','due_this_month','total_this_month','paid_this_month')); 


    //return response()->json(['Response'=>$billingData.$month.$year.$month-1]);

    }


    public function collect_bills(Request $request)
    {

        $collected_by=$request->collected_by;
        $client_id=$request->client_id;

        $timestamp = Carbon::now()->toDateString();

        $affectedRow = DB::table('billings')->where('client_id', $client_id)->where('billing_status',false)
                                            ->update(['billing_status' => true, "billing_date" => $timestamp, "collected_by" => $collected_by]);

        return redirect('manager/subscriber/search/'.$client_id)->with('success', trans("Bills Collected Successfully"));
    }

    public function collect_collection($id)
    {

        $affectedRow = DB::table('collectors')->where('id', $id)->update(['is_settled' => true]);
        return redirect('/manager/billing/bill_collection')->with('success', trans("Collection handedover Successfully"));
        
    }

    public function billcollection()
    {

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $billingData = DB::table("billings")->where('billing_status', '=', 1)->get();
        $subscribersData = DB::table("billings")->select('client_id', 'client_name')->where('bill_month', "=", $month)->where('billing_status', '=', 0)->get();
        $monthly_billing = DB::table("billings")->select('bill_amount', 'billing_status')->where('bill_month', "=", $month)->where('bill_year', "=", $year)->get();

        $total_this_month = 0;
        $paid_this_month = 0;
        $due_this_month = 0;
        $paid_today = 0;


        foreach ($monthly_billing as $item) {

            if ($item->billing_status == "1") {
                $paid_this_month = $paid_this_month + $item->bill_amount;
            } else {
                $due_this_month = $due_this_month + $item->bill_amount;
            }

            $total_this_month = $total_this_month + $item->bill_amount;
        }

        foreach ($billingData as $item) {

            $paid_today = $paid_today + $item->bill_amount;
        }

        $totalBilling = DB::table("billings")->select('bill_amount', 'billing_status')->get();

        $total_bill = 0;
        $paid_bills = 0;
        $due_bill = 0;


        foreach ($totalBilling as $item) {

            if ($item->billing_status == true) {
                $paid_bills = $paid_bills + $item->bill_amount;
            } else {
                $due_bill = $due_bill + $item->bill_amount;
            }

            $total_bill = $total_bill + $item->bill_amount;
        }


        $collectors = DB::table("collectors")->join("users", function($join){$join->on("collectors.user_id", "=", "users.id");})
        ->select("collectors.id", "users.first_name", "users.last_name", "collectors.amount",'collectors.day',"collectors.is_settled")
        ->get();
        


        return view('manager.bill_collection', compact('collectors','billingData', 'paid_bills', 'due_bill', 'subscribersData', 'total_bill', 'paid_today', 'due_this_month', 'total_this_month', 'paid_this_month'));
    }

    public function generate_bills()
    {
        //
        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $subscriberData = DB::table("subscribers")->select('client_id', 'client_name')->where('connection_status','=',1)->get()->toArray();
        $countSubscriber = DB::table("subscribers")->count();

        if ($countSubscriber == 0) {
            return redirect('manager/billing')->with('error', trans("অনুগ্রহ করে আগে গ্রাহক যোগ করুন।"));
        } else {
            foreach ($subscriberData as $item) {

                $clientCount = DB::table("billings")->where('client_id', "=", $item->client_id)->where('bill_month', '=', $month)->where('bill_year', '=', $year)->count();

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

            return redirect('manager/billing')->with('success', trans("Bill generated sucessfully।"));
        }
    }
}
