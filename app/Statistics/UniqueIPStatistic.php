<?php

namespace App\Statistics;

use Redis;

class UniqueIPStatistic extends BaseStatistic
{
    
    function getValue($value)
    {
        // Все что нужно, это вернуть количество IP-шников
        return Redis::sCard($this->getKey($value));
    }

    function touch($value)
    {
        // Собираем набор IP-шников
        Redis::sAdd($this->getKey($value), $_SERVER['REMOTE_ADDR']);
    }

    private function getKey($value)
    {
        return $this->group_name . ':' . $value . ':ip';
    }
}