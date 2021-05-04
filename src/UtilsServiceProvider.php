<?php

namespace Hooshid\Utils;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
        if ($this->app->runningInConsole() && function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/../config/query-maker.php' => config_path('query-maker.php'),
            ], 'config');
        }

        $this->mergeConfigFrom(
        __DIR__.'/path/to/config/blog.php', 'blog'
    );
*/

//echo config('app.env');
//echo config('app.debug');

        if (config('app.env') != "production") {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'utils');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //$this->mergeConfigFrom(__DIR__ . '/../config/query-maker.php', 'query-maker');
    }
}
