<?php

namespace App\Statistics;

use Redis;

abstract class Statistic
{
    protected $key;
    protected $group_name;
    
    function __construct($group_name, $name)
    {
        $this->key = $group_name . ':' . $name;
        $this->group_name = $group_name;
        
        //todo: вытащить наверх
        Redis::sAdd($this->group_name, $name);
    }

    abstract function getData();
    
    abstract function touch();
}