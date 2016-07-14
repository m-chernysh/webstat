<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Statistics\Statist;

class CounterController extends Controller
{
    protected $filename = "../resources/assets/img/smile_01.png";


    public function index()
    {
        try {
            foreach (config('statistic.parsers') as $source) {
                $parser = app('parsers.' . $source);
                $statist = new Statist($parser->getName());
                $statist->counter($parser->getData());
            }

        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                // todo: bugster
            }
        }

        return response()->file($this->filename);
    }
}