<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if(Auth::user()->role == "1"){
            return redirect('admin');
        } else if(Auth::user()->role == "2"){
            return redirect('client');
        } else if(Auth::user()->role == "3"){
            return redirect('teknisi');
        }
    }
}
