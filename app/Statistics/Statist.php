<?php
/**
 * Класс служит для группировки данных
 */

namespace App\Statistics;

use Redis;

class Statist
{
    protected $group_name = 'default';

    function setGroup($group_name)
    {
        $this->group_name = $group_name;
    }

    function counter($value)
    {
        Redis::sAdd($this->group_name, $value);
        
        foreach (config('statistic.statist') as $key => $class) {
            $counter = new $class($this->group_name, $value);
            $counter->touch();
        }
    }
    
    function getData()
    {
        $list = array();

        foreach (Redis::sMembers($this->group_name) as $item) {
            $list[$item] = [];
            foreach (config('statistic.statist') as $key => $class) {
                $counter = new $class($this->group_name, $item);
                $list[$item][$key] = $counter->getValue();
            }
        }

        return $list;
    }
}