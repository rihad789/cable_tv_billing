<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MobileAppController extends Controller
{
    //

    public function retrieve_area()
    {

        $areasData = DB::table("areas") ->get();
        return response()->json(['AreaJson'=>$areasData]);

    }

    public function retrieve_vicinity()
    {

        $vicinitiesData= DB::select( DB::raw("select vicinities.id,vicinities.vicinity_name,areas.area_name from vicinities INNER JOIN areas on vicinities.area_id=areas.id"));
        return response()->json(['VicinityJson'=>$vicinitiesData]);
    }

    public function retrieve_subscriber()
    {
        $subscriberData = DB::table("subscribers")->select('client_id','client_name') ->get();
        return response()->json(['SubscriberJson'=>$subscriberData]);
    }
}

