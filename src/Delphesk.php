<?php

namespace Delphesk;

class Delphesk 
{

	public function __construct()
	{

	}

	public function isAdmin()
	{
		return \Auth::check();
	}
}