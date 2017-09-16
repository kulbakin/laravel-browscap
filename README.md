# laravel-browscap

[Browscap-PHP](https://github.com/browscap/browscap-php) for [Laravel 5](http://laravel.com)/[Lumen 5](https://lumen.laravel.com/)

## Installation

Add package to your composer

```
{
    "require": {
        "propa/laravel-browscap": "1.*"
    }
}
``` 

Run `composer update`

### Laravel
Reference service provider and corresponding alias in your `app.php` config 

```php
'providers' => [
    // ...
    Propa\BrowscapPHP\BrowscapServiceProvider::class,
],
```

```php
'aliases' => [
    // ...
    'Browscap' => Propa\BrowscapPHP\Facades\Browscap::class,
],
```

Publish package config if necessary

```cli
php artisan vendor:publish
```

### Lumen

For Lumen, register a different Provider in `bootstrap/app.php`:

```php
 $app->register(\Propa\BrowscapPHP\BrowscapServiceProvider::class);
```
and also a facade
```php
 class_alias(\Propa\BrowscapPHP\Facades\Browscap::class, Browscap::class);
```

## Usage

Console commands defined by BrowscapPHP can be accessed via `artisan`, for the full list see

```cli
php artisan list browscap
```

Firstly, it is necessary to import browscap.ini and cache it, for that run
```cli
php artisan browscap:update
```

When necessary cache files are created by the above command, one can call `Browscap::getBrowser()` and analyze detected
browser type and features. The extent of feature detection depends on `browscap.ini` file imported (there are lite, default and full versions available).

For more information, look into docs for underlying [BrowscapPHP](https://github.com/browscap/browscap-php).
