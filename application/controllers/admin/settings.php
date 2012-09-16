<?php


class Admin_Settings_Controller extends Base_Controller{
	
	public $restful = true;

	public function get_index(){
		return View::make('admin.settings.home');
		// code to pull all images;
	}

	public function get_user($id){
		echo "user settings for user id = $id";
		// logic to show load edit view
	}


}