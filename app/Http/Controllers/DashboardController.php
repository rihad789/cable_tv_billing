<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    //

    public function index()
    {

        if (Auth::user()->hasRole('owner')) {

            return redirect('admin');

        } elseif (Auth::user()->hasRole('manager')) {
            
            return redirect('operator');
        }
    }
}


