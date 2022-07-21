<?php

// replace closures in routing - add actions to controller

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home.index');
    }

    public function contact(){
        return view('home.contact');
    }
}
