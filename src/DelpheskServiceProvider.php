<?php 

namespace Delphesk;

use Illuminate\Support\ServiceProvider;
use Delphesk\Repository\DelpheskRepository as Repo;

class DelpheskServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        include __DIR__.'/routes.php';

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('delphesk.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/views', 'delphesk');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('delphesk', function()
        {
            return new Delphesk(new Repo());
        });

    }

}