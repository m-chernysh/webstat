# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)


### Migrate database
Addition user admin@admin.com/secret

~~~
$ php artisan migrate
$ php artisan db:seed
~~~


### Update max mind cities database

~~~
$ php artisan geoip:update
~~~


### Тестовые страницы
Данные страницы заполняют БД фейковыми значениями

~~~
/testpage/0
/testpage/1
/testpage/2
/testpage/3
/testpage/4
/testpage/5
/testpage/6
/testpage/7
/testpage/8
/testpage/9
/testpage/10
~~~
