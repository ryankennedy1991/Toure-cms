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
		echo "new image";
		// logic to show new image
	}



	public function put_update($id){
		echo "updating image";
		// logic to updxate image here using $id
	}

	public function post_create(){
		echo "new image";
		// logic to create new image here
	}

	public function delete_delete($id){
		echo "delete file";
		// logic to delete file.
	}





}