<?php

namespace App\Statistics;

use Redis;

class HitsStatistic extends Statistic
{
    function getData()
    {
        return Redis::get($this->key);
    }

    function touch()
    {
        //Если еще нету таких хитов, то создаем
        if (null === Redis::get($this->key)) {
            Redis::set($this->key, 0);
        }

        // Увеличиваем хиты
        Redis::incr($this->key);
    }
}