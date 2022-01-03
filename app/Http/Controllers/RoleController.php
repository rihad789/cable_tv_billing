<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct(Role $role,Permission $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
        $this->middleware("auth");
    }

    public function index()
    {
        //
        $role=$this->role::all();
        $permission=$this->permission::all();

        return view("owner.role",['role'=> $role,'permission'=> $permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //

        $this->validate($request,[

            'name' =>'required|string|unique:roles',
            'permission_id[]'=>'nullable'

        ]);

        $role = $this->role->create([

            'name'=>$request->name,
        ]);

        foreach ( $request->permission_id as $index => $id ) {
            $role->attachPermission($request->permission_id[$index]);
         }

    

     return redirect('owner/role')->with('success','Role created successfully');

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
