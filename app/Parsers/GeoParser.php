<?php

namespace App\Parsers;

use Torann\GeoIP\GeoIPFacade as GeoIP;

class GeoParser extends Parser
{
    protected $name = 'geo';
    
    function getData()
    {
        $geo = GeoIP::getLocation($_SERVER['REMOTE_ADDR']);
        return $geo['country'];
    }
}