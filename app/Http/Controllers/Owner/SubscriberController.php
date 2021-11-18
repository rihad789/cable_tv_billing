<?php
namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Billings;
use Carbon\Carbon;

class SubscriberController extends Controller
{
    public function index()
    {

        $subscriberData = DB::table("subscribers") ->get();
        $areasData = DB::table("areas") ->get();

        $total_sub = DB::table("subscribers")->count();
        $disconnect_sub=DB::table("subscribers")->where('connection_status','=',0)->count();
        $connected_sub=DB::table("subscribers")->where('connection_status','=',1)->count();


        return view('owner.subscriber',compact('subscriberData','areasData','total_sub','disconnect_sub','connected_sub'));
    }

    
    public function search_body()
    {
        //
        return view('owner.search_bill');
    }

    public function search_result($id)
    {
        //
        $subscriberData = DB::table("subscribers")->where('client_id','=',$id) ->first();
        //$billingData = DB::table("billings")->where('client_id','=',$id)->orderByDesc('billing_status')->get();
        $dueBilldata = DB::table("billings")->select('bill_amount')->where('client_id','=',$id)->where('billing_status','=',false)->get();

        $due_bills=0;
        $due_month=0;

        foreach ($dueBilldata as $item) {
            $due_bills=$due_bills+$item->bill_amount;
            $due_month=$due_month+1;
        }

        // $billingData = DB::table("billings")->where("client_id", "=", $id)->orderBy("billing_status","asc")->get();

        $billingData = DB::table("billings")->where('client_id','=',$id)->where('billing_status','=',false)->get();


        $userData = DB::table("users")->select('id','first_name','last_name')->get();
                
    
        return view('owner.search_bill',compact('id','due_month','due_bills','subscriberData','userData','billingData','dueBilldata'));

    }

    public function add_subscriber(Request $request)
    {
        //
        $client_id=DB::table("subscribers")->where('client_id','=',$request->client_id)->count();

        if($client_id==1)
        {
            return redirect("owner/subscriber")->with('error', trans("সরি! গ্রাহকের আইডি আগে থেকে ডাটাবেজে আছে।"));
        }
        else
        {

        $areasData = DB::table("areas")->select('area_name')->where('id','=',$request->area) ->first();
        $vicinityData = DB::table("vicinities")->select('vicinity_name') ->where('id','=',$request->vicinity) ->first();

        $addressData= $request->address.' , '.$vicinityData->vicinity_name.' , '.$areasData->area_name;
        $subscriber = Subscriber::create([

            'client_id' => $request->client_id,
            'client_name' => $request->client_name,
            'client_father' => $request->client_father,
            'area' => $request->area,
            'vicinity' => $request->vicinity,
            'address' => $addressData,
            'initialization_date' => $request->initialization_date,
            'mobile_no' => $request->mobile_no,
            'bill_amount' =>$request->bill_amount,
            'locked_fund' => $request->locked_fund,
            'connection_status' =>'1'

        ]);

        return redirect("owner/subscriber")->with('success', trans("নতুন গ্রাহক যুক্ত হয়েছে।"));

        }

    }

    
    public function getVicinity($id)
    {

        $vicinityData = DB::table("vicinities")->where('area_id', $id)->select('id', 'vicinity_name')->get();
        return response()->json(['data' => $vicinityData]);

    }

    public function view_subscriber($id)
    {
        //

        $subscriberData = DB::table("subscribers")->where('client_id','=',$id) ->first();
        
        $billingData = DB::table("billings")->where('client_id','=',$id)->get();

        $dueBilldata = DB::table("billings")->where('client_id','=',$id)->where('billing_status','=',false)->get();


        $areasData = DB::table("areas") ->get();


        $sub_client_id = DB::table("subscribers")->get();


        return response()->json(['subscriberData'=>$subscriberData,'billingData'=>$billingData,'sub_client_id'=>$sub_client_id,'dueBilldata'=>$dueBilldata,'areasData'=>$areasData ]);


        // return view('owner.subscriber',compact('id','areasData','subscriberData','sub_client_id','billingData','dueBilldata'));


        // $subscriberData = DB::table("subscribers")->where('client_id','=',$id) ->first();
        
        // $status = DB::table("subscribers")->select('connection_status')->where('client_id','=',$id) ->first();

        // $billingData = DB::table("billings")->where('client_id','=',$id)->where('billing_status','=',0)->get();

        // $total_bill=0;
        // $due_bill=0;

        // foreach ($billingData as $item) {
        //     $total_bill=$total_bill+$item->bill_amount;
        //     $due_bill = $due_bill + 1;
        // }

        // $connection_status=$status->connection_status;
        // $areasData = DB::table("areas") ->get();


        // //$billingData = DB::table("billings")->where('client_id',"=",$id)->get();
        
        // //return view('owner.view.view_subscriber',compact('id','areasData','subscriberData','billingData','total_bill','due_bill','connection_status'));
        // return response()->json(['Successfully posted.ID: '=>$subscriberData,$billingData,$total_bill,$due_bill,$connection_status ]);
    }

    public function cut_lock_fund($id)
    {

        $billingData = DB::table("billings")->where('client_id','=',$id)->where('billing_status','=',0)->get();

        $total_bill=0;

        foreach ($billingData as $item) {
            $total_bill=$total_bill+$item->bill_amount;
        }

        $subscriberData = DB::table("subscribers")->select('locked_fund')->where('client_id','=',$id) ->first();

        $locked_fund=$subscriberData->locked_fund;

        $final_amount=$locked_fund-$total_bill;

        if($final_amount>0)
        {
            $updated_by = auth()->user()->first_name . " " . auth()->user()->last_name;
            $timestamp = Carbon::now()->toDateString();

            $affectedRow = DB::table("billings")
            ->where('client_id','=',$id)
            ->where('billing_status','=',0)
            ->update(['billing_status' => 1, "billing_date" => $timestamp, "updated_by" => $updated_by]);

            $affectedRow2 = DB::table("subscribers")
            ->where('client_id','=',$id)
            ->update(['connection_status' => 0,'locked_fund'=>$final_amount]);

             return redirect('owner/subscriber/'.$id)->with('success', trans("বাকী বিল জামানত থেকে কাটা হয়েছে।"));
            
        }
        else
        {
            return redirect('owner/subscriber/'.$id)->with('success', trans("বাকী বিল জামানত এর পরিমান থেকে কম।।"));
        }

    }

    public function subscriber_bills($id)
    {

        $billingData = DB::table("billings")
        ->where("client_id", "=", $id)
        ->orderBy("billing_status","asc")
        ->get();
        
    
        return view('owner.view.view_subscriber_bills',compact('billingData'));
        //return response()->json(['Response'=>$billingData]);

    }

}
