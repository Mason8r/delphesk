<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelpheskTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delphesk_tickets' , function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('subject');
			$table->boolean('status')->default(1);
			$table->timestamps();
		});

		Schema::create('delphesk_ticket_messages' , function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('ticket_id')->unsigned();
			$table->foreign('ticket_id')->references('id')->on('delphesk_tickets')->onDelete('cascade');
			$table->mediumText('message');
			$table->timestamps();
		});

		Schema::table('users', function($table)
		{
		    $table->boolean('ticket_admin')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delphesk_tickets');

		Schema::drop('delphesk_ticket_messages');

		Schema::table('users', function($table)
		{
		    $table->dropColumn('ticket_admin');
		});
	}

}
