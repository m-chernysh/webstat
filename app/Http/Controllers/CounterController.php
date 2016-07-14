<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Statistics\Statist;

class CounterController extends Controller
{
    protected $filename = "../resources/assets/img/smile_01.png";


    /**
     * @param Statist $statist
     * @return mixed
     * @throws \Exception
     */
    public function index(Statist $statist)
    {
        try {
            foreach (config('statistic.parsers') as $source) {
                $parser = app('parsers.' . $source);
                $statist->setGroup($parser->getName());
                $statist->counter($parser->getData());
            }

        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                // todo: bugster
            }
        }

        return response()->file($this->filename);
    }


    /**
     * Тестовый метод, для проверки статистики
     * 
     * @param Statist $statist
     * @return mixed
     * @throws \Exception
     */
    public function test(Statist $statist, $id)
    {
        // Сценарии
        switch ($id) {
            case '1':
                $_SERVER['HTTP_REFERER'] = 'http://webstat.ru/';
                $_SERVER['REMOTE_ADDR'] = "109.105.77.32";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.5";
                break;
            case '2':
                $_SERVER['HTTP_REFERER'] = 'http://google.com/';
                $_SERVER['REMOTE_ADDR'] = "8.8.8.8";
                break;
            case '3':
                $_SERVER['HTTP_REFERER'] = 'http://webstat.ru/';
                $_SERVER['REMOTE_ADDR'] = "149.202.13.66";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.5";
                break;
            case '4':
                $_SERVER['HTTP_REFERER'] = 'http://webstat.ru/';
                $_SERVER['REMOTE_ADDR'] = "5.189.129.137";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Opera/15.0.1147.100";
                break;
            case '5':
                $_SERVER['HTTP_REFERER'] = 'http://yandex.ru/';
                $_SERVER['REMOTE_ADDR'] = "213.180.204.3";
                break;
            case '6':
                $_SERVER['HTTP_REFERER'] = 'http://yandex.ru/';
                $_SERVER['REMOTE_ADDR'] = "213.180.204.3";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.5";
                break;
            case '7':
                $_SERVER['HTTP_REFERER'] = 'http://yandex.ru/';
                $_SERVER['REMOTE_ADDR'] = "213.180.204.3";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Opera/15.0.1147.100";
                break;
            case '8':
                $_SERVER['HTTP_REFERER'] = 'http://webstat.ru/';
                $_SERVER['REMOTE_ADDR'] = "5.189.129.137";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.5";
                break;
            case '9':
                $_SERVER['HTTP_REFERER'] = 'http://google.com/';
                $_SERVER['REMOTE_ADDR'] = "8.8.8.8";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.5";
                break;
            case '10':
                $_SERVER['HTTP_REFERER'] = 'http://google.com/';
                $_SERVER['REMOTE_ADDR'] = "8.8.8.8";
                $_SERVER['HTTP_USER_AGENT'] = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0";
                break;
            default:
                return view('test.counter');
        }
        
        try {
            foreach (config('statistic.parsers') as $source) {
                $parser = app('parsers.' . $source);
                $statist->setGroup($parser->getName());
                $statist->counter($parser->getData());
            }

        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                // todo: bugster
            }
        }

        return view('test.page1', [
            'referer' => $_SERVER['HTTP_REFERER'],
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
    }
}