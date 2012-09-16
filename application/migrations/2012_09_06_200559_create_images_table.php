<?php

class Create_Images_Table {

	public function up()
	{
		Schema::create('images', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('location');
			$table->integer('size');
			$table->string('type');
			$table->text('description')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('images');
	}

}