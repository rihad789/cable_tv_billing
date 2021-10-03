<?php
namespace App\Http\Controllers\Admin;
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
        return view('admin.subscriber',compact('subscriberData','areasData'));
    }

    public function store(Request $request)
    {
        //
        $subscriber = Subscriber::create([

            'client_id' => $request->client_id,
            'client_name' => $request->client_name,
            'client_father' => $request->client_father,
            'area' => $request->area,
            'vicinity' => $request->vicinity,
            'address' => $request->address,
            'initialization_date' => $request->initialization_date,
            'mobile_no' => $request->mobile_no,
            'bill_amount' =>$request->bill_amount,
            'locked_fund' => $request->locked_fund,
            'connection_status' =>'1'

        ]);

        return redirect("admin/subscriber")->with('success', trans("নতুন গ্রাহক যুক্ত হয়েছে।"));
    }

    public function getVicinity($id)
    {

        $vicinityData = DB::table("vicinities")->where('area_id', $id)->select('id', 'vicinity_name')->get();
        return response()->json(['data' => $vicinityData]);

    }

    public function view($id)
    {
        //
        //$subscriberData = DB::table("subscribers")->where('client_id','=',$id) ->get();
        $subscriberData=DB::select(DB::raw("select subscribers.id,subscribers.client_id,subscribers.client_name,subscribers.client_father,
        subscribers.address,subscribers.initialization_date,subscribers.disconnection_date,subscribers.mobile_no,subscribers.bill_amount,
        subscribers.locked_fund,subscribers.connection_status,areas.area_name,vicinities.vicinity_name from subscribers 
        INNER JOIN areas on subscribers.area=areas.id INNER JOIN vicinities on subscribers.vicinity=vicinities.id LIMIT 1"));

        $billingData = DB::table("billings")->where('client_id','=',$id)->where('billing_status','=',0)->get();

        $total_bill=0;

        foreach ($billingData as $item) {
            $total_bill=$total_bill+$item->bill_amount;
        }

        //$billingData = DB::table("billings")->where('client_id',"=",$id)->get();
        
        return view('admin.view.view_subscriber',compact('subscriberData','billingData','total_bill'));
        //return response()->json(['Successfully posted.ID: '=>$subscriberData]);
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

            $affectedRow2 = DB::table("subscribers")->where('client_id','=',$id)->update(['connection_status' => 0]);
                return redirect('/admin/subscriber/view/'.$id)->with('success', trans("বাকী বিল জামানত থেকে কাটা হয়েছে।"));
            
        
        }
        else
        {
            return redirect('/admin/subscriber/view/'.$id)->with('success', trans("বাকী বিল জামানত এর পরিমান থেকে কম।।"));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscriber $subscriber)
    {
        //
    }
}
