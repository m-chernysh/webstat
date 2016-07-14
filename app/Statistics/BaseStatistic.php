<?php

namespace App\Statistics;

abstract class BaseStatistic
{
    protected $group_name;
    
    function __construct($group_name)
    {
        $this->group_name = $group_name;
    }

    abstract function getValue($value);
    
    abstract function touch($value);
}