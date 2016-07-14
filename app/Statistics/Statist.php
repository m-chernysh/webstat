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
        
        foreach (config('statistic.statist') as $key) {
            $counter = app('statist.' . $key, [$this->group_name]);
            $counter->touch($value);
        }
    }
    
    function getData()
    {
        $list = array();

        foreach (Redis::sMembers($this->group_name) as $value) {
            $list[$value] = [];
            foreach (config('statistic.statist') as $key) {
                $counter = app('statist.' . $key, [$this->group_name]);
                $list[$value][$key] = $counter->getValue($value);
            }
        }

        return $list;
    }
}