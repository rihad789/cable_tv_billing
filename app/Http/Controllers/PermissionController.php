<?php

namespace App\Http\Controllers;

use App\Models\Permission as ModelsPermission;
use Illuminate\Http\Request;
use App\Models\Permission;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(Permission $permission)
     {
         $this->permission=$permission;
         $this->middleware("auth");
     }

    public function index()
    {
        //

        $permission=$this->permission::all();

        return view("owner.permission",['permission'=> $permission]);
    }

    public function add(Request $request)
    {
        //

        $this->permission->create([

            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->display_name,
        ]);

     return redirect('owner/permission')->with('success','Permission created successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
