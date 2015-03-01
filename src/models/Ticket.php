<?php 

namespace Delphesk\Models;

use \Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'delphesk_tickets';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['subject'];

	public function messages()
	{
		return $this->hasMany('\Delphesk\Models\Message');
	}

	public function user()
	{
		return $this->belongsTo('\App\User');
	}

}
