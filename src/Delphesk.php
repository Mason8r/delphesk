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
	* @return integer
	*/
	public function create($ticket)
	{
		return $this->repo->createTicket($ticket);
	}

	/**
	* Find a ticket based on it's identification number
	* @param $ticket array
	* @return array
	*/
	public function findTicket($ticketId)
	{
		return $this->repo->findTicket($ticketId);
	}

	/**
	* Get all tickets for current user (or ALL if user is ticket admin)
	* @param void
	* @return array
	*/
	public function allTickets()
	{
		dd(config('delphesk.table'));
	}
}