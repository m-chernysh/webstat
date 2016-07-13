<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Stat;

class CounterController extends Controller
{
    protected $filename = "../resources/assets/img/smile_01.png";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $stat = new Stat();
            $stat->process();

        } catch (\Exception $e) {
            if (config('debug')) {
                dd($e->getMessage());
            } else {
                // todo: bugster
            }
        }

        return response()->file($this->filename);
    }
}