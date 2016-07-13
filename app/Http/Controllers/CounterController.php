<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\UserAgent;
use Torann\GeoIP\GeoIPFacade as GeoIP;
use App\Stat;

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
            $referer = parse_url(array_get($_SERVER, 'HTTP_REFERER'), PHP_URL_HOST);

            Stat::add(Stat::BROWSER, $browser);
            Stat::add(Stat::OS, $os);
            Stat::add(Stat::GEO, $geo['country']);
            Stat::add(Stat::REFERER, $referer);

        } catch (\Exception $e) {
            if (config('debug')) {
                dd($e->getMessage());
            }
            // todo: Собираем ошибки в багстер
        }

        return response()->file("../resources/assets/img/smile_01.png");
    }
}
