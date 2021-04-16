<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mainSite(){

        return view ('landing');
    }

    public function index()
    {
        return view('home');
    }
}
