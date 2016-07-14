<?php

namespace App\Statistics;

use Redis;

class UniqueIPStatistic extends BaseStatistic
{
    function __construct($group_name, $name)
    {
        $this->key = $group_name . ':' . $name . ':ip';
    }
    
    function getValue()
    {
        // Все что нужно, это вернуть количество IP-шников
        $ips = Redis::sMembers($this->key);
        return count($ips);
    }

    function touch()
    {
        // Собираем набор IP-шников
        $ip = $_SERVER['REMOTE_ADDR'];
        Redis::sAdd($this->key, $ip);
    }
}