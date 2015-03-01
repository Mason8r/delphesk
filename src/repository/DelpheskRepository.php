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
	* Find and return a single ticket and all it's children based on the ticket id
	* @param string $id
	* @return array
	*/
	public function findTicket($id)//, Authenticatable $user)
	{
		$ticket = Ticket::with('messages.user','user')->find($id);
		
		if(!$ticket) {
			return false;
		}

		return $ticket->toArray();
	}

	/**
	* Takes an array and creates a ticket & message, returns ID of ticket if successful
	* @param $ticket array
	* @return object
	*/
	public function createTicket($entry)//, Authenticatable $user)
	{
		$ticket = $this->createNewTicket($entry);
		$message = $this->createNewMessage($entry, $ticket);

		return $ticket;
	}

	/**
	* Creates a new ticket and adds a subject. Returns Ticket object
	* @param $entry array
	* @return object
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
	* @param $subject array, $ticket Collection,
	* @return object
	*/
	public function createNewMessage($entry, $ticket)
	{
		$message = new Message;
		$message->message = $entry['message'];
		$message->ticket()->associate($ticket);
		$message->user()->associate($this->currentUser);
		$message->save();

		return $message;
	}

}