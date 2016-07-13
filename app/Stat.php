<?php

namespace App;

use Redis;

class Stat
{
    const BROWSER = 'browser';
    const OS = 'os';
    const GEO = 'geo';
    const REFERER = 'referer';


    /**
     * Получаем статистические данные в виде массива, где
     * ключ - соответствует параметру вызова,
     * значение - количеству инициализаций
     *
     * @param $name
     * @return array
     */
    static function getData($name)
    {
        $names = $name . 's';
        $len = Redis::llen($names);
        $list = Redis::lrange($names, 0, $len - 1);

        $stats = [];
        foreach ($list as $value) {
            $key = $name . ':' . $value;
            $stats[$value] = Redis::get($key);
        }
        
        return $stats;
    }

    /**
     * Добавляем елемент в хранилище
     *
     * @param $name
     * @param $value
     */
    static function add($name, $value)
    {
        if (!$value) {
            return;
        }

        $names = $name . 's';
        $key = $name . ':' . $value;
        if (null === Redis::get($key)) {
            Redis::set($key, 0);
        }
        
        Redis::incr($key);
        Redis::rpush($names, $value);
    }
}