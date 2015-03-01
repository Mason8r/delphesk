<?php 

namespace Delphesk\Controllers;

use \App\Http\Controllers\Controller;
use \Delphesk\Requests\StoreReplyRequest;
use \Delphesk\Requests\StoreTicketRequest;

class TicketController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Ticket Controller
	|--------------------------------------------------------------------------
	|
	| This controller helps create, reply and show tickets.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the all tickets
	 *
	 * @return Response
	 */
	public function showAll()
	{
		$tickets = \Delphesk::allTickets();

		return view('delphesk::all', compact('tickets'));
	}

	/**
	 * Show single ticket
	 *
	 * @param $id integer
	 * @return Response
	 */
	public function showTicket($id)
	{
		$ticket = \Delphesk::findTicketArray($id);

		return view('delphesk::single', compact('ticket'));
	}

	/**
	 * Show the create new ticket form
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('delphesk::create');
	}

	/**
	 * Store the new ticket
	 *
	 * @param \Delphesk\Requests\StoreTicketRequest $request
	 * @return Response
	 */
	public function store(StoreTicketRequest $request)
	{
		$ticket = \Delphesk::create($request->all());

		return redirect()->route('showTicket', $ticket->id);
	}

	/**
	 * Reply to a ticket
	 *
	 * @param \Delphesk\Requests\StoreReplyRequest $request
	 * @return Response
	 */
	public function reply(StoreReplyRequest $request) 
	{

	    $reply = \Delphesk::addReply($request->all());

	    return redirect()->route('showTicket', $request->ticket_id);

	}



}
