<?php

namespace Delphesk\Repository;

Class DelpheskRepository implements DelpheskRepositoryInterface
{
	public function checkIfCurrentUserAdmin()
	{
		return \Auth::check();
	}
}