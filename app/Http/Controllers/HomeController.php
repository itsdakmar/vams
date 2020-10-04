<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index(){
        return view('dashboard');
    }

    public function logout(){
        auth('web')->logout();
        return redirect()->route('dashboard');
    }
}
