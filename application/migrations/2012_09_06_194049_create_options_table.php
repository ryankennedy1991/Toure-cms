<?php

class Create_Options_Table {

	public function up()
	{
		Schema::create('options', function($table) {
			$table->increments('id');
			$table->string('option', 255);
			$table->string('choice', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('options');
	}

}