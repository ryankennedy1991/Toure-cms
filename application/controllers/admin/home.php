<?php


class Admin_Home_Controller extends Base_Controller{
	
	public $restful = true;

	public function get_index(){

		if (Auth::guest()){
		return View::make('admin.login');
		} else{
			return View::make('admin.home')->with('email', Auth::user()->email);
		}
	}

	public function post_index(){
		$credentials = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($credentials)){

			return Redirect::to('admin');
			
		}
	}


}