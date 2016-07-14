<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Statistics\Statist;

class HomeController extends Controller
{

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
        //
    }


    public function group(Statist $statist, $group)
    {
        $statist->setGroup($group);

        return view('home', [
            'group' => $group,
            'collection' => $statist->getData(),
        ]);
    }
}
