<?php

return [
    'parsers' => [
        'browser',
        'os',
        'geo',
        'referer',
    ],
    
    'statist' => [
        'hits' => App\Statistics\HitsStatistic::class,
        'unique_ip' => App\Statistics\UniqueIPStatistic::class,
        'unique_cookie' => App\Statistics\UniqueCookieStatistic::class,
    ]
];