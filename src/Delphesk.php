<?php

namespace Delphesk;

use Delphesk\Repository\DelpheskRepositoryInterface as Repo;

/**
* The Main Delphesk class
* Create, edit and save new tickets
*/
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
	* Reply to a current ticket
	* @param $ticket array
	* @return integer
	*/
	public function addReply($request)
	{
		$ticket = $this->repo->findTicket($request['ticket_id']);
		return $this->repo->createNewMessage($request, $ticket);
	}

	/**
	* Find a ticket based on it's identification number, return arry
	* @param $ticket array
	* @return array
	*/
	public function findTicket($ticketId)
	{
		return $this->repo->findTicket($ticketId);
	}

	/**
	* If admin, then return ALL tickets, else 
	* @param void
	* @return array
	*/
	public function allTickets()
	{
		return $this->repo->allTickets();
	}


}
