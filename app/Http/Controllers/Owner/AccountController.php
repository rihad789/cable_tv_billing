<?php

namespace App\Http\Controllers\Owner;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Settlements;
use App\Models\Billings;
use Illuminate\Support\Carbon;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $memoTotal = DB::table("memos")->select('products_total','grand_amount')->where('is_settled','=',false)->get();
        $totalMemo = DB::table("memos")->where('is_settled','=',false)->count();

        $total_products=0;
        $grand_total=0;

        foreach ($memoTotal as $item) {
            $total_products=$total_products+$item->products_total;
            $grand_total=$grand_total+$item->grand_amount;
        }

        $payable_balance=($locked_fund+$bill_paid)-($sallery_paid+$grand_total);

        return view('owner.account', compact('locked_fund','totalEmployee','totalSallery','sallery_paid','sallery_due','sallery_status','totalMemo','payable_balance','total_bill','bill_paid','bill_due','total_products','grand_total')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settle_account(Request $request)
    {
        //

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $checkSettlements = DB::table("settlements")->where('settled_month','=',$month)->where('settled_year','=',$year)->count();

        $checkColletors=DB::table('collectors')->where('is_settled',false)->count();

        if($checkColletors>0)
        {
            return redirect('owner/account_diary')->with('success', trans("Please Collect all Collection first"));
        }
        else
        {

        if($checkSettlements >=1)
        {
            return redirect('owner/account_diary')->with('success', trans("Account already settled this month successfully!"));
        }
        else
        {

         $sallery_paid=$request->sallery_paid;
         $locked_fund =$request->locked_fund;
         $bill_paid =$request->bill_paid;
         $grand_total=$request->grand_total;
         $balance_paid=$request->payable_balance;
      
         $settleBills = Billings::where('billing_status', true)->delete();
        
         $settleSallery=DB::table('salleries')->where('payment_status','=',true)->update(['is_settled'=>true]);

         $settleMemo=DB::table('memos')->where('is_settled','=',false)->update(['is_settled'=>true]);
 
         $settleSubscriber=DB::table('subscribers')->where('is_settled','=',false)->update(['is_settled'=>true]);
 
         $subscriber = Settlements::create([

             'sallery_paid' => $sallery_paid,
             'locked_fund' => $locked_fund,
             'collected_bills' => $bill_paid,
             'cost_in_service' => $grand_total,
             'balance_paid' => $balance_paid,
             'settled_month'=> $month,
             'settled_year'=> $year

         ]);
 
 
         return redirect('owner/account_diary')->with('success', trans("Account settled successfully!"));

        }

    }

    }

    public function settlements()
    {

        $settlementsData = DB::table("settlements")->get();

        return view('owner.settlements', compact('settlementsData')); 


    }

   
}
