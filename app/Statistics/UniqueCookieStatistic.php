<?php

namespace App\Statistics;

use Redis;
use Illuminate\Support\Facades\Cookie;

class UniqueCookieStatistic extends BaseStatistic
{
    function __construct($group_name, $name)
    {
        $this->key = $group_name . ':' . $name . ':cookie';
    }
    
    function getValue()
    {
        return Redis::get($this->key);
    }

    function touch()
    {
        //Если еще нету таких хитов, то создаем
        if (null == Redis::get($this->key)) {
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