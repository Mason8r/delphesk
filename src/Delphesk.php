<?php

namespace Delphesk;

use Delphesk\Repository\DelpheskRepositoryInterface as Repo;

class Delphesk 
{
	
	public $repo;

	public function __construct(Repo $repo)
	{
		$this->repo = $repo;
	}

	/**
	* Get all of the current users tickets
	* @param $ticket array
	* @return array
	*/
	public function create($ticket)
	{
		return $this->repo->createTicket($ticket);
	}
}