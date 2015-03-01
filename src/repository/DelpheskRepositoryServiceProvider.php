<?php 

namespace Delphesk\Repository;

use Illuminate\Support\ServiceProvider;

class DelpheskRepositoryServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'DeslpheskRepositoryInterface', 
            'DeslpheskRepository'
        );

    }

}