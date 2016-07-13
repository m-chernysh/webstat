<?php

namespace App\Parsers;

class RefererParser extends Parser
{
    protected $name = 'referer';
    
    function getData()
    {
        return parse_url(array_get($_SERVER, 'HTTP_REFERER'), PHP_URL_HOST);
    }
}