<?php 

class Admin_Gallery_Controller extends Base_Controller{
	
	public function action_index(){
		return View::make('admin.gallery.all');
		// code to pull all images;
	}

	public function action_show($id){
		echo "single image $id";
		// logic to show load edit view
	}


	public function action_edit($id){
		echo "The image id is $id";
		// logic to show load edit view
	}

	public function action_new(){
		return View::make('admin.gallery.upload');
	}



	public function put_update($id){
		echo "updating image";
		// logic to updxate image here using $id
	}

	public function action_create(){
		print_r(Input::upload(Input::file('image.tmp_name'), "/img/".Input::file('image.name') , Input::file('image.name')));
	}

	public function delete_delete($id){
		echo "delete file";
		// logic to delete file.
	}





}