<?php

namespace App\Parsers;

abstract class Parser
{
    protected $name;

    abstract function getData();
    
    function getName()
    {
        return $this->name;
    }
}