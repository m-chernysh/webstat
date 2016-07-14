<?php

namespace App\Statistics;

use Redis;

class HitsStatistic extends BaseStatistic
{
    
    function getValue($value)
    {
        return Redis::get($this->getKey($value));
    }

    function touch($value)
    {
        $key = $this->getKey($value);

        //Если еще нету таких хитов, то создаем
        if (null === Redis::get($key)) {
            Redis::set($key, 0);
        }

        // Увеличиваем хиты
        Redis::incr($key);
    }

    private function getKey($value)
    {
        return $this->group_name . ':' . $value;
    }
}