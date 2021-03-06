<?php

class Create_Users_Table {

	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->integer('role');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}