<?php

Route::get('tickets', [
    'as' => 'tickets', 'uses' => 'Delphesk\Controllers\TicketController@showAll'
]);

Route::get('tickets/new', [
    'as' => 'newTicket', 'uses' => 'Delphesk\Controllers\TicketController@create'
]);

Route::post('tickets/new', [
    'as' => 'storeTicket', 'uses' => 'Delphesk\Controllers\TicketController@store'
]);

Route::post('tickets/reply/{id}', [
    'as' => 'replyTicket', 'uses' => 'Delphesk\Controllers\TicketController@reply'
]);

Route::get('tickets/single/{id}', [
    'as' => 'showTicket', 'uses' => 'Delphesk\Controllers\TicketController@showTicket'
]);
