<?php

namespace App\Http\Controllers\Manager;

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


class ProfileController extends Controller
{

    // Admin Area Functions
    public function my_profile()
    {

        $userEmail = Auth::user()->email;

        $userData = DB::table("users")->select("users.id","users.email","users.phone","users.first_name","users.last_name","users.gender","users.civilstatus",
        "users.division","users.district","users.thana","users.street","users.postal_code","image_url")->where("email", "=", $userEmail)->first();

        if ($userData->image_url == null) {
            $image = "Untitled-2.png";
        } else {
            $image = $userData->image_url;
        }

        return view('manager.my_profile', compact('userData', 'image'))->with('message');
    }

    public function update_profile(Request $request)
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
            return redirect('manager/my_profile')->with('success', trans("Owner profile updated successfully!"));
        } else {
            return back()->with('error', trans("Owner profile is already updated!"));
        }
    }

    public function upload_image(Request $request)
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
            return redirect('manager/my_profile')->with('success', trans("Profile Image Updated Successfully!"));
        }
    }


    public function my_account()
    {
        $authEmail = Auth::user()->email;

        $userData = DB::table("users")->select("users.id","users.email","users.first_name","users.last_name")->where("email", "=", $authEmail)->first();

        return view('manager.my_account', compact('userData'));
    }


    public function update_account(Request $request)
    {

        $id = $request->id;
        $email = $request->email;
        //$first_name = $request->first_name;
        //$last_name = $request->last_name;

        $affectedRow = DB::update("UPDATE users SET email = '$email' WHERE id= '$id'");

        //return response()->json(['contact_email' => $contact_email, 'phone' => $phone, 'altphone' => $altphone, 'first_name' => $first_name, 'last_name' => $last_name, 'gender' => $gender, 'civilstatus' => $civilstatus,'division' => $division, 'district' => $district, 'thana' => $thana, 'street' => $street, 'postal_code' => $postal_code,'pres_division' => $pres_division, 'pres_district' => $pres_district, 'pres_thana' => $pres_thana, 'pres_postal_code' => $pres_postal_code, 'pres_street' => $pres_street]);


        if ($affectedRow == 1) {
            return redirect('manager/my_account')->with('success', trans("Account Updated Successfully!"));
        } else {
            return back()->with('error', trans("Account is Already updated!"));
        }
    }


    public function update_password(Request $request)
    {

        $authEmail = Auth::user()->email;

        //$auth_email="ebnaamirfoysal@yahoo.com";

        $old_password = str_replace(' ', '', $request->old_password);;
        $new_password = str_replace(' ', '', $request->new_password);

        $oldPasswordHash = User::select('password')
            ->where("email", "=", $authEmail)
            ->first();

        if (Hash::check($old_password, $oldPasswordHash->password)) {
            $affectedRow = User::where('email', $authEmail)->update(['password' => Hash::make($new_password)]);

            if ($affectedRow == 1) {

                return redirect('manager/my_account')->with('success', trans("Password changed successfully!"));
            }
        } else {

            return redirect('manager/my_account')->with('error', trans("Sorry! Old Password doesn't match!"));
        }

    }


}
