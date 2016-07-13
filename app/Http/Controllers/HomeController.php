<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Stat;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        dd([
            Stat::getData(Stat::BROWSER),
            Stat::getData(Stat::OS),
            Stat::getData(Stat::GEO),
            Stat::getData(Stat::REFERER),
        ]);

        return view('home');
    }
}
