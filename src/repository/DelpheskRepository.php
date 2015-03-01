<?php

namespace Delphesk\Repository;

use Delphesk\Models\Ticket;
use Delphesk\Models\Message;

use Illuminate\Contracts\Auth\Authenticatable;

Class DelpheskRepository implements DelpheskRepositoryInterface
{

	public $currentUser;

	public function __construct()
	{
		$this->currentUser = \Auth::user();
	}
	/**
	* Takes an array and creates a ticket & message
	* @param $ticket array
	* @return array
	*/
	public function createTicket($entry)//, Authenticatable $user)
	{
		$ticket = $this->createANewTicketAndAddSubjectAssociateItWithCurrentUser($entry);

		$message = $this->createANewMessageAndAssociateItWithTicketAndCurrentUser($entry, $ticket);

		return $ticket->toArray();
	}

	/**
	* Creates a new ticket and adds a subject. Returns Ticket object
	* @param string $subject
	* @return Obj Ticket
	*/
	public function createANewTicketAndAddSubjectAssociateItWithCurrentUser($entry)
	{
		$ticket = new Ticket();

		$ticket->subject = $entry['subject'];

		$ticket->user()->associate($this->currentUser);

		$ticket->save();

		return $ticket;
	}

	/**
	* Creates a new messsage and associates with with the passed ticket.
	* @param string $subject, Ticket $ticket
	* @return Obj Message
	*/
	public function createANewMessageAndAssociateItWithTicketAndCurrentUser($entry,$ticket)
	{
		$message = new Message;

		$message->message = $entry['message'];

		$message->ticket()->associate($ticket);

		$message->user()->associate($this->currentUser);
	
		$message->save();

		return $message;
	}
}