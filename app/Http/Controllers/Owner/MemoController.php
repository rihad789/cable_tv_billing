<?php

namespace App\Http\Controllers\Owner;

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
        $memoData=DB::select( DB::raw("select memos.memo_no,memos.products_total,memos.grand_amount,memos.creation_date,users.first_name,users.last_name
         from memos INNER JOIN users on memos.buyer_id=users.id where memos.is_settled = false;"));
        $userData = DB::table("users")->select('id','first_name','last_name')->get();
        return view('owner.memo',compact('memoData','userData'));
    }

    public function create()
    {
        //
    }

    public function add_memo(Request $request)
    {
        //
        $dt = Carbon::now();
        $creation_date=$dt->toFormattedDateString();

        $check_memo_no = DB::table("memos")->where("memos.memo_no", "=", $request->memo_no)->count();

        if($check_memo_no==1)
        {
            return redirect("owner/memo")->with('error', trans("Sorry ! This memo no already exist in the database!"));
        }
        else
        {
            $memo=Memo::create([

                'memo_no' => $request->memo_no,
                'buyer_id' => $request->buyer_id,
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


        return redirect("owner/memo")->with('error', trans("New service cost memo added succsfully!"));

    }

    public function view_memo($id)
    {
        //
        $memoProducts=DB::table("memos")->select("memos.products_total")->where("memos.memo_no", "=", $id) ->first();

        $memoData=$memoProducts->products_total;

        $memoDetails=DB::table("memo_details")->where("memo_details.memo_no", "=", $id)->get();
        $total_amount  = DB::table("memo_details")->where("memo_details.memo_no", "=" , $id)->sum("total_amount");


        return view('owner.view.view_memo',compact('memoDetails','memoData','total_amount'));

        //return response()->json(['Response'=>$accountData]);
    }

    public function memo_history(Request $request)
    { 

        $memoData=DB::select( DB::raw("select memos.memo_no,memos.products_total,memos.grand_amount,memos.creation_date,users.first_name,users.last_name
        from memos INNER JOIN users on memos.buyer_id=users.id where memos.is_settled = true;"));

       $userData = DB::table("users")->select('id','first_name','last_name')->get();
       
       return view('owner.memo',compact('memoData','userData'));

   // return response()->json(['Response'=>'122544554456']);

    }



}
