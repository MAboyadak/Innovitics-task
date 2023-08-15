<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homePage()
    {
        if(!Auth::check()){
            return view('home.guest');
        }

        return view('home.user');
    }
}
