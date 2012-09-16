<?php

class Create_Posts_Table {

	public function up()
	{
		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->string('post_title');
			$table->text('post_content');
			$table->string('slug');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
		});
		
	}

	public function down()
	{
		Schema::drop('posts');
	}

}