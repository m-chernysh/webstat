<?php

namespace App;

use Redis;
use Illuminate\Support\Facades\Cookie;

class Stat
{
    const BROWSER = 'browser';
    const OS = 'os';
    const GEO = 'geo';
    const REFERER = 'referer';
    
    protected $parsers = array();
    
    
    function __construct()
    {
        foreach (config('statistic.parsers') as $source) {
            $this->parsers[] = app($source);
        }
    }
    
    
    function process()
    {
        foreach ($this->parsers as $parser) {
            $name = $parser->getName();
            $data = $parser->getData();
            $this->save($name, $data);
        }
    }


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

        dd( Redis::sMembers('list') );

        $stats = [];
        foreach ($list as $value) {
            $key = $name . ':' . $value;
            $key_ip = $key . ':ip';
            $key_unique = $key . ':unique';
            $stats[$value] = [
                'hits' => Redis::get($key),
                'unique_ip' => Redis::llen($key_ip),
                'unique_cookie' => Redis::get($key_unique),
            ];
        }

        return $stats;
    }

    /**
     * Добавляем елемент в хранилище
     * {names : [item1, item2, item3, ...]} - набор доступных итемов
     * {name:item1 : count} - количество хитов
     * {name:item1:unique : count} - количество уникальных хитов
     *
     * @param $name - название группы
     * @param $value - название итема
     */
    protected function save($name, $value)
    {
        if (!$value) {
            return;
        }

        $names = $name . 's';
        $key = $name . ':' . $value;
        $key_ip = $key . ':ip';
        $key_unique = $key . ':unique';

        if (null === Redis::get($key)) {
            Redis::set($key, 0);
            Redis::set($key_unique, 0);
        }

        // Пушим в общий набор итемов
        Redis::sAdd('list', $value);
        
        // Увеличиваем обычные хиты
        Redis::incr($key);

        // Проверяем уникальных по кукам
        if (!Cookie::get('not_unique')) {
            Cookie::queue('not_unique', true);
            Redis::incr($key_unique);
        }

        //Пушим уникальные IP
//        Redis::rpush($key_ip, $_SERVER['REMOTE_ADDR']);
    }
}