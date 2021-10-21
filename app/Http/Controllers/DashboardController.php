<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;



class DashboardController extends Controller
{
    //

    public function index()
    {

        if (Auth::user()->hasRole('manager')) {
            
            return redirect('manager');
        }
        elseif (Auth::user()->hasRole('employee')) {
            
            return redirect('employee');
        }
    }
}


