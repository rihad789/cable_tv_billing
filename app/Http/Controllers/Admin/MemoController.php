<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Memo;
use App\Models\MemoDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class MemoController extends Controller
{

    public function index()
    {
        //
        $memoData=DB::table("memos") ->get();
        return view('admin.memo',compact('memoData'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $dt = Carbon::now();
        $creation_date=$dt->toFormattedDateString();

        $check_memo_no = DB::table("memos")->where("memos.memo_no", "=", $request->memo_no)->count();

        if($check_memo_no==1)
        {
            return redirect("admin/memo")->with('error', trans("সরি!এই মেমো নং ডাটাবেজে জমা আছে!"));
        }
        else
        {
            $memo=Memo::create([

                'memo_no' => $request->memo_no,
                'buyer_name' => $request->buyer_name,
                'products_total' => $request->products_total,
                'grand_amount' => $request->grand_amount,
                'creation_date' => $creation_date,
    
            ]);

            foreach ( $request->title as $index => $id ) {

                $account = MemoDetails::create([
                    'title' => $request->title[$index],
                    'quantity' => $request->quantity[$index],
                    'single_unit_price' => $request->single_unit_price[$index],
                    'total_amount' => $request->total_amount[$index],
                    'memo_no' => $request->memo_no
                ]);
                
             }
        }


        return redirect("admin/memo")->with('error', trans("নতুন হিসাব যুক্ত সম্পুর্ন হয়েছে!"));

    }

    public function view($id)
    {
        //
        $memoProducts=DB::table("memos")->select("memos.products_total")->where("memos.memo_no", "=", $id) ->first();

        $memoData=$memoProducts->products_total;

        $memoDetails=DB::table("memo_details")->where("memo_details.memo_no", "=", $id)->get();
        $total_amount  = DB::table("memo_details")->where("memo_details.memo_no", "=" , $id)->sum("total_amount");


        return view('admin.view.view_memo',compact('memoDetails','memoData','total_amount'));

        //return response()->json(['Response'=>$accountData]);
    }

    public function edit(Account $account)
    {
        //
    }

    public function update(Request $request, Account $account)
    {
        //
    }

    public function destroy(Account $account)
    {
        //
    }
}
