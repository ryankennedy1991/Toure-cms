<?php

class Create_Pages_Table {

	public function up()
	{
		Schema::create('pages', function($table) {
			$table->increments('id');
			$table->string('page_name');
			$table->text('page_content');
			$table->integer('level');
			$table->integer('order');
			$table->string('slug');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pages');
	}

}