<?php

class Admin_Logout_Controller extends Base_Controller{
	
	public $restful = true;

	public function get_index(){
		Auth::logout();
		return Redirect::to('/');
	}

}