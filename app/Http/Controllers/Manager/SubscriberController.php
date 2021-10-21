<?php
namespace App\Http\Controllers\Manager;
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


        $timestamp = Carbon::now()->toDateString();

        //if($month.strlen(1)) {  $month="0".$month; }

        $dateTime=Carbon::parse($timestamp)->year."-".Carbon::parse($timestamp)->month;

        $total_sub = DB::table("subscribers")->count();
        $disconnect_sub=DB::table("subscribers")->where('connection_status','=',0)->count();
        $connected_sub=DB::table("subscribers")->where('connection_status','=',1)->count();
                
        //Retrieving Subscriber Count for this Month
        $subMonth=DB::table("subscribers")->where("created_at", "like", "$dateTime%")->count();


        return view('manager.subscriber',compact('subscriberData','subMonth','areasData','total_sub','disconnect_sub','connected_sub'));
    }

    public function store(Request $request)
    {
        //
        $client_id=DB::table("subscribers")->where('client_id','=',$request->client_id)->count();

        if($client_id==1)
        {
            return redirect("admin/subscriber")->with('error', trans("সরি! গ্রাহকের আইডি আগে থেকে ডাটাবেজে আছে।"));
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

        return redirect("manager/subscriber")->with('success', trans("নতুন গ্রাহক যুক্ত হয়েছে।"));

        }


    }

    public function getVicinity($id)
    {

        $vicinityData = DB::table("vicinities")->where('area_id', $id)->select('id', 'vicinity_name')->get();
        return response()->json(['data' => $vicinityData]);

    }

    public function view($id)
    {
        //
        $subscriberData = DB::table("subscribers")->where('client_id','=',$id) ->first();
        
        $status = DB::table("subscribers")->select('connection_status')->where('client_id','=',$id) ->first();

        $billingData = DB::table("billings")->where('client_id','=',$id)->where('billing_status','=',0)->get();

        $total_bill=0;
        $due_bill=0;

        foreach ($billingData as $item) {
            $total_bill=$total_bill+$item->bill_amount;
            $due_bill = $due_bill + 1;
        }

        $connection_status=$status->connection_status;
        $areasData = DB::table("areas") ->get();


        //$billingData = DB::table("billings")->where('client_id',"=",$id)->get();
        
        return view('manager.view.view_subscriber',compact('id','areasData','subscriberData','billingData','total_bill','due_bill','connection_status'));
        //return response()->json(['Successfully posted.ID: '=>$subscriberData,$billingData,$total_bill,$due_bill,$connection_status ]);
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

             return redirect('manager/subscriber/'.$id)->with('success', trans("বাকী বিল জামানত থেকে কাটা হয়েছে।"));
            
        }
        else
        {
            return redirect('manager/subscriber/'.$id)->with('success', trans("বাকী বিল জামানত এর পরিমান থেকে কম।।"));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        //

        $filter_input_area=$request->filter_input_area;
        $filter_input_vicinity=$request->filter_input_vicinity;
        $subscriberData="";

        if($filter_input_area != null && $filter_input_vicinity != null)
        {
            $subscriberData = DB::table("subscribers")->where('area','=',$filter_input_area)->where('vicinity','=',$filter_input_vicinity)->get();
        }
        else if($filter_input_area != null && $filter_input_vicinity == null)
        {
            $subscriberData = DB::table("subscribers")->where('area','=',$filter_input_area)->get();
        }
        else
        {
            $subscriberData = DB::table("subscribers") ->get();
        }

        $areasData = DB::table("areas") ->get();

        $total_sub = DB::table("subscribers")->count();
        $disconnect_sub=DB::table("subscribers")->where('connection_status','=',0)->count();
        $connected_sub=DB::table("subscribers")->where('connection_status','=',1)->count();

        
        $timestamp = Carbon::now()->toDateString();

        //if($month.strlen(1)) {  $month="0".$month; }

        $dateTime=Carbon::parse($timestamp)->year."-".Carbon::parse($timestamp)->month;

        //Retrieving Subscriber Count for this Month
        $subMonth=DB::table("subscribers")->where("created_at", "like", "$dateTime%")->count();

        return view('manager.subscriber',compact('subscriberData','subMonth','areasData','total_sub','disconnect_sub','connected_sub'));

    }


    public function subscriber_bills($id)
    {

        $billingData = DB::table("billings")
        ->where("client_id", "=", $id)
        ->orderBy("billing_status","asc")
        ->get();
        
    
        return view('manager.view.view_subscriber_bills',compact('billingData'));
        //return response()->json(['Response'=>$billingData]);

    }

}
