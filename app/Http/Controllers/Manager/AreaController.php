<?php

namespace App\Http\Controllers\Manager;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vicinity;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{

    public function index()
    {
        //
        $areasData = DB::table("areas") ->get();

        $vicinitiesData= DB::select( DB::raw("select vicinities.id,vicinities.vicinity_name,areas.area_name from vicinities INNER JOIN areas on vicinities.area_id=areas.id"));

        return view('manager.area',compact('areasData','vicinitiesData'));
    }

    public function add_area(Request $request)
    {
        //
        $check_area = DB::table("areas")
        ->where("areas.area_name", "=", $request->area_name)
        ->count();

        if($check_area==1)
        {
            return redirect("manager/area_vicinity")->with('error', trans("Sorry!This area already exists in the database"));
        }
        else
        {
            $subscriber = area::create([
                'area_name' => $request->area_name
            ]);
        }

        return redirect("manager/area_vicinity")->with('error', trans("New Area added sucessfully!"));
    }

    public function delete_area($id)
    {
        $affectedRow = Area::where('id', $id)->delete();

        if ($affectedRow == 1) {

            $affectedRow2 = Vicinity::where('id', $id)->delete();

            return redirect('manager/area_vicinity')->with('success', trans("Area Deleted successfully!"));
        
        }

    }


    public function add_vicinity(Request $request)
    {
        //
        $check_vicinity = DB::table("vicinities")
        ->where("vicinities.area_id", "=", $request->area_id)
        ->where("vicinities.vicinity_name", "=", $request->vicinity_name)
        ->count(); 

        if($check_vicinity==1)
        {
            return redirect("manager/area_vicinity")->with('error', trans("Sorry! This vicinity already exist in the database"));
        }
        else
        {
            $subscriber = Vicinity::create([
                'area_id'=>  $request->area_id,
                'vicinity_name' => $request->vicinity_name
            ]);
        }

        return redirect("manager/area_vicinity")->with('error', trans("New Vicinity added successfully!"));
    }

    public function delete_vicinity($id)
    {
        $affectedRow = Vicinity::where('id', $id)->delete();

        if ($affectedRow == 1) {
            return redirect('manager/area_vicinity')->with('success', trans("Vicinity Deleted successfully!"));
        }

    }

}


