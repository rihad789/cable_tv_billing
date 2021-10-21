<?php
namespace App\Http\Controllers\Employee;
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


        return view('employee.subscriber',compact('subscriberData','subMonth','areasData','total_sub','disconnect_sub','connected_sub'));
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
        
        return view('employee.view.view_subscriber',compact('id','areasData','subscriberData','billingData','total_bill','due_bill','connection_status'));
        //return response()->json(['Successfully posted.ID: '=>$subscriberData,$billingData,$total_bill,$due_bill,$connection_status ]);
    }


    public function subscriber_bills($id)
    {

        $billingData = DB::table("billings")
        ->where("client_id", "=", $id)
        ->orderBy("billing_status","asc")
        ->get();
        
    
        return view('employee.view.view_subscriber_bills',compact('billingData'));
        //return response()->json(['Response'=>$billingData]);

    }

}
