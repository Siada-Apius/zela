<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('comment');
            $table->smallInteger('status');
            $table->string('author_ip', 20);
            $table->smallInteger('vk');
            $table->smallInteger('posted');
            $table->smallInteger('rate');
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
		Schema::drop('comments');
	}

}
