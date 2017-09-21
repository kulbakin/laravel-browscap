<?php

namespace Propa\BrowscapPHP;

use BrowscapPHP\Browscap;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use WurflCache\Adapter\File;

/**
 * Browscap service provider
 *
 * @author Pavel Kulbakin <p.kulbakin@gmail.com>
 */
class BrowscapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('browscap', function () {
            $bc = new Browscap();
            $adapter = new File([File::DIR => config('browscap.cache')]);
            $bc->setCache($adapter);

            return $bc;
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\CheckUpdateCommand::class,
                Console\ConvertCommand::class,
                Console\FetchCommand::class,
                Console\LogfileCommand::class,
                Console\ParserCommand::class,
                Console\UpdateCommand::class,
            ]);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['browscap'];
    }

    protected function setupConfig()
    {
        $source = dirname(__DIR__) . '/config/browscap.php';

        if ($this->app instanceof LaravelApplication) {
            $this->publishes([$source => config_path('browscap.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('browscap');
        }

        $this->mergeConfigFrom($source, 'browscap');
    }
}
