<?php 

namespace Delphesk\Repository;

use Illuminate\Contracts\Auth\Authenticatable;

interface DelpheskRepositoryInterface
{
	public function createTicket($ticket);//, Authenticatable $user);
}