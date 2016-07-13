<?php

namespace App\Parsers;

use Torann\GeoIP\GeoIPFacade as GeoIP;

class GeoParser extends Parser
{
    const NAME = 'geo';
    
    function getData()
    {
        $geo = GeoIP::getLocation();
        return $geo['country'];
    }
}