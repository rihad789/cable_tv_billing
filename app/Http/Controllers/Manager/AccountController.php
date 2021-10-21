<?php

namespace App\Http\Controllers\Manager;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

        $totalBilling = DB::table("billings")->select('billing_status','bill_amount')->get();

        $locked_fund=DB::table("subscribers")->sum('locked_fund');

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

        $memoTotal = DB::table("memos")->select('products_total','grand_amount')->get();
        $totalMemo = DB::table("memos")->count();

        $total_products=0;
        $grand_total=0;

        foreach ($memoTotal as $item) {
            $total_products=$total_products+$item->products_total;
            $grand_total=$grand_total+$item->grand_amount;
        }

        $payable_balance=$bill_paid-$grand_total;


        return view('manager.account', compact('locked_fund','totalMemo','payable_balance','total_bill','bill_paid','bill_due','total_products','grand_total')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
