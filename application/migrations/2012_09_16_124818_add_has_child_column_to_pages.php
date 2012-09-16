<?php

class Add_Has_Child_Column_To_Pages {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pages', function($table)
		{

			$table->integer('has_child');


		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}