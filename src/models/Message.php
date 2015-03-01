<?php 

namespace Delphesk\Models;

use \Illuminate\Database\Eloquent\Model;

class Message extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'delphesk_ticket_messages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['message'];

	public function ticket()
	{
		return $this->belongsTo('\Delphesk\Models\Ticket');
	}

	public function user()
	{
		return $this->belongsTo('\App\User');
	}

}
