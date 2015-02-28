<?php 

namespace Delphesk;

use Illuminate\Support\ServiceProvider;

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
        \App::bind('delphesk', function()
        {
            return new Delphesk;
        });
    }

}