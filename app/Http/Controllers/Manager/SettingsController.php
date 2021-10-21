<?php

namespace App\Http\Controllers\Manager;

use App\Models\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function index()
    {
        //
        $settingsData=DB::table("settings")->get();
        return view('admin.settings',compact('settingsData'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Settings $settings)
    {
        //
    }

    public function edit(Settings $settings)
    {
        //
    }

    public function update(Request $request, Settings $settings)
    {
        //
    }

    public function destroy(Settings $settings)
    {
        //
    }
}
