<?php

namespace App\Statistics;

use Redis;

class UniqueCookieStatistic extends Statistic
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
        
        // Проверяем уникальных по кукам
        if (!Cookie::get('not_unique')) {
            // Увеличиваем хиты
            Redis::incr($this->key);
            Cookie::queue('not_unique', true);
        }
    }
}