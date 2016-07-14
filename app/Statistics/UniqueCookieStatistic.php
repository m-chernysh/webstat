<?php

namespace App\Statistics;

use Redis;
use Illuminate\Support\Facades\Cookie;

class UniqueCookieStatistic extends BaseStatistic
{
    
    function getValue($value)
    {
        return Redis::get($this->getKey($value));
    }

    function touch($value)
    {
        $key = $this->getKey($value);

        //Если еще нету таких хитов, то создаем
        if (null == Redis::get($key)) {
            Redis::set($key, 0);
        }
        
        // Проверяем уникальных по кукам
        if (!Cookie::get('not_unique')) {
            // Увеличиваем хиты
            Redis::incr($key);
            Cookie::queue('not_unique', true);
        }
    }

    private function getKey($value)
    {
        return $this->group_name . ':' . $value . ':cookie';
    }
}