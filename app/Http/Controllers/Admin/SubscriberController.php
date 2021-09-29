<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
{
    public function index()
    {
        //Generating Random card no.

        // $client_id = mt_rand(123456,987654);

        // $status=1;

        // while($status==1)
        // {
        //     $check_card_no = DB::table("subscribers")
        //     ->where("subscribers.client_id", "=", $client_id)
        //     ->count();

        //     if($check_card_no==0)
        //     {
        //         $status=0;
        //     }
        //     else
        //     {
        //         $client_id = mt_rand(123456,987654);
        //     }
        // }

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

    public function show(subscriber $subscriber)
    {
        //
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
