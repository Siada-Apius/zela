<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique()->nullable();
			$table->string('password', 60);
			$table->string('first_name', 60);
			$table->string('last_name', 60);
			$table->string('skype', 60);
			$table->string('icq', 15);
			$table->string('country', 25);
			$table->string('city', 20);
			$table->string('image', 255);
			$table->string('role', 6);
			$table->string('gender', 15);
			$table->timestamp('birthday');
			$table->string('social_id', 60);
			$table->string('social', 60);
			$table->string('paid', 60);

            $table->rememberToken();
            $table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
