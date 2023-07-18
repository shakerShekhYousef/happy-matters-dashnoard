<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return redirect()->route('web_properties_list');
        return view('dashboard.home');
    }
    
    public function login()
    {
        return view('dashboard.login');
    }
}
