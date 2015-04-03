<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title', 100);
            $table->string('short', 255);
            $table->text('full');
            $table->string('title_rus', 100);
            $table->string('short_rus', 255);
            $table->text('full_rus');
            $table->string('title_eng', 100);
            $table->string('short_eng', 255);
            $table->text('full_eng');
            $table->string('uri', 50);
            $table->smallInteger('posted');
            $table->string('status', 25);
            $table->float('rate');
            $table->smallInteger('vk');
            $table->string('breadcrumb', 32);
            $table->string('breadcrumb_name', 32);
            $table->smallInteger('votes');
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
		Schema::drop('articles');
	}

}
