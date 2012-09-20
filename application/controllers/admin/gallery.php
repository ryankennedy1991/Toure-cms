<?php 

class Admin_Gallery_Controller extends Base_Controller{
	
	public function action_index(){
		$user = User::find(Auth::user()->id);
		$images = $user->images;
		return View::make('admin.gallery.all')->with('images', $images);
		
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
		$input = Input::all();
        if( isset($input['description']) ) {
            $input['description'] = filter_var($input['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }
        $rules = array(
            'image' => 'required|image|max:200', //photo upload must be an image and must not exceed 1000kb
            'description' => 'required', //description is required
            'name' => 'required'
        );

        $messages = array(
        	'image_required' => 'Please select an image for upload!',
        	'image_max' => 'Make sure image is no larger than 500kb',
        	'image_image' => 'Please select an image file'
        );
        $validation = Validator::make($input, $rules, $messages);
        if( $validation->fails() ) {
            return Redirect::to('admin/gallery/new')->with_errors($validation);
        }
        $extension = File::extension($input['image']['name']);
        $directory = path('public').'uploads/'.sha1(Auth::user()->id);
        $filename = sha1(Auth::user()->id.time()).".{$extension}";
        $upload_success = Input::upload('image', $directory, $filename);
        if( $upload_success ) {
            $photo = new Image(array(
            	'name' => Input::get('name'),
                'location' => '/uploads/'.sha1(Auth::user()->id).'/'.$filename,
                'description' => $input['description'],
                'type' => $extension
            ));
            Auth::user()->images()->insert($photo);
            Session::flash('status_create', 'Successfully uploaded your new Instapic');
            Session::flash('id', $photo->id);
        } else {
        	Log::write('admin.gallery.create', 'Image was not uploaded, $photo->create() returned false.');
            Session::flash('error_create', 'An error occurred while uploading your new Instapic - please try again.');
        }
        return Redirect::to('admin/gallery/new');
	}

	public function delete_delete($id){
		echo "delete file";
		// logic to delete file.
	}





}