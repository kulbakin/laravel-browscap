<?php

declare(strict_types=1);

namespace Propa\BrowscapPHP\Console;

use BrowscapPHP\Command\FetchCommand as Command;

/**
 * Wrap console command provided by browscap package to expose it to Laravel
 *
 * @author Pavel Kulbakin <p.kulbakin@gmail.com>
 */
class FetchCommand extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(config('browscap.cache'), config('browscap.file'));

        // set default option according to config option
        $this->getDefinition()->getOption('remote-file')->setDefault(config('browscap.remote-file'));

        // allocate necessary resources for the possible pick usage during parsing/caching of browscap.ini database file
        ini_set('memory_limit', '512M');
    }
}
