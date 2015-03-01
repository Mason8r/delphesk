<?php

Route::get('/delphesk', function() {

	return view('delphesk::all');

});

Route::get('/delphesk/create', function() {

	return view('delphesk::create');

});

Route::post('/delphesk/create', function(Delphesk\Requests\StoreTicketRequest $request) {

	$ticket = Delphesk::createAndReturn($request->all());

	return redirect('/delphkesk/single/' . $ticket->id);

});

Route::get('/delphesk/single/{id}', function($id) {

	$ticket = Delphesk::findTicket($id);

	if(!$ticket) {
		return abort(404);
	}

	return view('delphesk::single', compact('ticket'));

});
