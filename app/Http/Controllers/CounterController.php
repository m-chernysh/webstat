<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\UserAgent;
use Torann\GeoIP\GeoIPFacade as GeoIP;

class CounterController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $browser = UserAgent::getBrowser();
            $os = UserAgent::getOS();
            $geo = GeoIP::getLocation('109.105.77.32');
            $reff = parse_url(array_get($_SERVER, 'HTTP_REFERER'), PHP_URL_HOST);
        } catch (\Exception $e) {
            // todo: Собираем ошибки в багстер
        }

        return response()->file("../resources/assets/img/smile_01.png");
    }
}
