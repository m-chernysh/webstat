<?php

namespace App\Statistics;

abstract class BaseStatistic
{
    protected $key;
    
    function __construct($group_name, $name)
    {
        $this->key = $group_name . ':' . $name;
    }

    abstract function getValue();
    
    abstract function touch();
}