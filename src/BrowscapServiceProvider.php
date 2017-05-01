<?php namespace Propa\BrowscapPHP;

/**
 * Browscap service provider
 *
 * @author Pavel Kulbakin <p.kulbakin@gmail.com>
 */
class BrowscapServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
		$this->publishes([
			__DIR__.'/../config/browscap.php'  => config_path('browscap.php'),
		]);
	}

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/browscap.php', 'browscap'
        );

        $this->app->singleton('browscap', function ($app) {
            $bc = new \BrowscapPHP\Browscap();
            $adapter = new \WurflCache\Adapter\File([\WurflCache\Adapter\File::DIR => config('browscap.cache')]);
            $bc->setCache($adapter);

            return $bc;
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
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
}
