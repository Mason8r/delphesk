<?php 

namespace Delphesk\Repository;

use Illuminate\Contracts\Auth\Authenticatable;

interface DelpheskRepositoryInterface
{
    public function allTickets();

    public function allUsersTickets($user);

    public function createTicket($ticket);

    public function createNewMessage($entry, $ticket);

    public function findTicket($id);
}
