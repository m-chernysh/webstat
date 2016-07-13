<?php

namespace App\Statistics;

use Redis;

class UniqueIPStatistic extends Statistic
{
    function getData()
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