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
	* Takes an array and creates a ticket & message, returns ID of ticket if successful
	* @param $ticket array
	* @return integer
	*/
	public function createTicket($entry)//, Authenticatable $user)
	{
		$ticket = $this->createNewTicket($entry);
		$message = $this->createNewMessage($entry, $ticket);

		if( ! $ticket) {
			return false;
		}

		return $ticket->id;
	}

	/**
	* Creates a new ticket and adds a subject. Returns Ticket object
	* @param string $subject
	* @return Obj Ticket
	*/
	public function createNewTicket($entry)
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
	public function createNewMessage($entry,$ticket)
	{
		$message = new Message;
		$message->message = $entry['message'];
		$message->ticket()->associate($ticket);
		$message->user()->associate($this->currentUser);
		$message->save();

		return $message;
	}

	public function getFullTicketArray(Ticket $ticket)
	{
		return Ticket::with('messages','user')->find($ticket->id)->toArray();
	}
}