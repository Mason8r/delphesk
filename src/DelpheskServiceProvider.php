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

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('delphesk.php'),
        ]);
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