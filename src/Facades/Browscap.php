<?php

declare(strict_types=1);

namespace Propa\BrowscapPHP\Facades;

/**
 * Facade for Browscap
 * @see \BrowscapPHP\Browscap
 *
 * @author Pavel Kulbakin <p.kulbakin@gmail.com>
 */
class Browscap extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'browscap';
    }
}
