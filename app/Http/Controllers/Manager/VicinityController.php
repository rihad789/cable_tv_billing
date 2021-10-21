<?php

namespace App\Http\Controllers\Manager;

use App\Models\Vicinity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VicinityController extends Controller
{

    public function index()
    {
        //
        $vicinitiesData = DB::table("vicinities") ->get();
        $areasData = DB::table("areas") ->get();
        return view('admin.vicinity',compact('vicinitiesData','areasData'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Vicinity $vicinity)
    {
        //
    }

    public function edit(Vicinity $vicinity)
    {
        //
    }

    public function update(Request $request, Vicinity $vicinity)
    {
        //
    }

    public function destroy(Vicinity $vicinity)
    {
        //
    }
}
