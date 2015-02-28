<?php

namespace Delphesk\Facade;

use Illuminate\Support\Facades\Facade;

class DelpheskFacade extends Facade {

    protected static function getFacadeAccessor() { return 'delphesk'; }

}