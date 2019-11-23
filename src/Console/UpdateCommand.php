<?php

declare(strict_types=1);

namespace Propa\BrowscapPHP\Console;

use BrowscapPHP\Command\UpdateCommand as Command;

/**
 * Wrap console command provided by browscap package to expose it to Laravel
 *
 * @author Pavel Kulbakin <p.kulbakin@gmail.com>
 */
class UpdateCommand extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(config('browscap.cache'));

        // set default option according to config option
        $this->getDefinition()->getOption('remote-file')->setDefault(config('browscap.remote-file'));

    }
}
