<?php

declare(strict_types=1);

namespace Propa\BrowscapPHP\Console;

use BrowscapPHP\Command\ConvertCommand as Command;

/**
 * Wrap console command provided by browscap package to expose it to Laravel
 *
 * @author Pavel Kulbakin <p.kulbakin@gmail.com>
 */
class ConvertCommand extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(config('browscap.cache'), config('browscap.file'));

    }
}
