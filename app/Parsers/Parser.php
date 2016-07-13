<?php

namespace App\Parsers;

abstract class Parser
{
    const NAME = 'default';

    abstract function getData();
    
    function getName()
    {
        return self::NAME;
    }
}