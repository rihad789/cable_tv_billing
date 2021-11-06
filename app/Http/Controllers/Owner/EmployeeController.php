<?php

namespace App\Http\Controllers\Owner;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Sallery;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;


class EmployeeController extends Controller
{
    //

    public function index()
    {

        $userEmail = Auth::user()->email;

        $user = DB::select(DB::raw("select users.id,users.email,users.first_name,users.last_name,roles.display_name from users 
            INNER JOIN role_user on role_user.user_id=users.id INNER JOIN roles on roles.id=role_user.role_id where NOT users.email='$userEmail'"));

        $role_id = DB::table("roles")->get();

        return view('owner.employee', compact('user', 'role_id'));
    }


    public function add_employee(Request $request)
    {

        $emailExist = DB::table("users")->where("email", "=", $request->email)->count();

        if ($emailExist >= 1) {
            return back()->with('error', trans("User already registered!"))->withInput();
        } else {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->attachRole($request->role_id);

            return redirect('owner/employee')->with('success', trans("User registered successfully!"));
        }
    }

    public function view_employee($id)
    {

        $userEmail = Auth::user()->email;

        $userData = DB::table("users")->select("users.id","users.email","users.phone","users.first_name","users.last_name","users.gender","users.civilstatus","users.division",
        "users.district","users.thana","users.street","users.postal_code","image_url")->where("id", "=", $id)->first();

        if ($userData->image_url == null) {
            $image = "Untitled-2.png";
        } else {
            $image = $userData->image_url;
        }

        return view('owner.view.view_employee', compact('userData', 'image'))->with('message');

        //return response()->json(['userData'=>$userData]);
    }

    public function upload_employee_image(Request $request)
    {

        //$imageName = $request->image;  

        $image_url = DB::table("users")->select('phone')->where("id", "=", $request->id)->first();

        $imageName = $image_url->phone . '.' . $request->image->getClientOriginalExtension();


        if (file_exists(public_path('images/img/.$imageName'))) {

            unlink(public_path('images/img/.$imageName'));

            $request->image->move(public_path('images/img'), $imageName);
        } else {

            $request->image->move(public_path('images/img'), $imageName);
        }

        //$request->image->move(public_path('images/img'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        $affectedRow = DB::update("UPDATE users SET image_url = '$imageName' WHERE id= '$request->id'");

        if ($affectedRow == 1) {
            return redirect('owner/employee/' . $request->id)->with('success', trans("Profile Image Updated Successfully!"));
        }

        // return response()->json(['Response'=>$affectedRow]);

    }

    public function update_employee(Request $request)
    {

        $id = $request->id;
        $phone = $request->phone;

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $gender = $request->gender;
        $civilstatus = $request->civilstatus;

        $division = $request->division;
        $district = $request->district;
        $thana = $request->thana;
        $street = $request->street;
        $postal_code = $request->postal_code;

        $affectedRow = DB::update("UPDATE users SET phone = '$phone', first_name = '$first_name',last_name = '$last_name', gender = '$gender', 
        civilstatus = '$civilstatus',division = '$division', district = '$district', thana = '$thana', street = '$street', postal_code = '$postal_code' WHERE id= $id");

        //return response()->json(['contact_email' => $contact_email, 'phone' => $phone, 'altphone' => $altphone, 'first_name' => $first_name, 'last_name' => $last_name, 'gender' => $gender, 'civilstatus' => $civilstatus,'division' => $division, 'district' => $district, 'thana' => $thana, 'street' => $street, 'postal_code' => $postal_code,'pres_division' => $pres_division, 'pres_district' => $pres_district, 'pres_thana' => $pres_thana, 'pres_postal_code' => $pres_postal_code, 'pres_street' => $pres_street]);


        if ($affectedRow == 1) {
            return redirect('owner/employee/' . $id)->with('success', trans("Operator Profile Updated Successfully!"));
        } else {
            return back()->with('error', trans("Profile is Already Updated!"));
        }
    }

    public function delete_employee($id)
    {

        $affectedRow = User::where('id', $id)->delete();

        if ($affectedRow == 1) {

            $affectedRowRole = DB::table('role_user')
                ->where('user_id', $id)
                ->delete();

            if ($affectedRowRole == 1) {

                return redirect('owner/employee')->with('success', trans("Users Deleted successfully!"));
            }
        }
    }

}

