<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function pagenotfound()
    { 
        return view('errors.404');  
    }

    public function internalerror()
    {
        return view('errors.500');
    }

    public function index()
    {
        return view("dashboard");
    }
    
    
}
