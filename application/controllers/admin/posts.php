<?php 

class Admin_Posts_Controller extends Base_Controller{


	// show all posts - ALL
	public function action_index(){
		$posts = Post::order_by('created_at', 'desc')->get();
		return View::make('admin.posts.all')->with('posts', $posts);
	}

	// edit form - Edit
	public function action_edit($id){
		$post = Post::find($id);
		return View::make('admin.posts.edit')->with('post', $post);
	}

	// show single post - SHOW
	public function action_show($segment){
		if(is_numeric($segment)){
			$post = Post::where('id', '=', $segment)->first();
		} else {	
			$post = Post::where('slug', '=', $segment)->first();
		}

		if ($post){
			return View::make('admin.posts.show')
						 ->with('content', $post);
		} 
			return Response::error('404');

	}

	// new form - NEW
	public function action_new(){
		return View::make('admin.posts.new');
	}






	// create new post - CREATE
	public function action_create(){

		$slug = $this->slugger(Input::get('title'));

		$db = Post::create(array(
				'post_title' => Input::get('title'),
				'post_content' => Input::get('content'),
				'slug' => $slug,
				'user_id' => Auth::user()->id
			));
		
		if(!$db){
			Log::write('admin.posts.create', 'Post was not created, post->create() returned false.');
			 return Redirect::to('/admin/posts/new')
		                 ->with('error_create', 'Unable to create post!');
		}   

		return Redirect::to('/admin/posts/new')
		                 ->with('status_create', 'New Post Created')
					     ->with('id', $db->id);

	}

	// update post - UPDATE
	public function action_update($id){
		
		$post = Post::find($id);

		$slug = $this->slugger(Input::get('title'));

		if($post->post_title == Input::get('title') && $post->post_content == Input::get('content')){
			return Redirect::to("admin/posts/$id/edit")->with('status_update', 'post updated');
		}

		$post->post_title = Input::get('title');
		$post->post_content = Input::get('content');
		$post->slug = $slug;
		$success = $post->save();

		if(!$success){
			Log::write('/admin/posts/:id/edit', 'could not update post - $post->save returned false');
			return Redirect::to("admin/posts/$id/edit")->with('error_update', 'post could not be updated');
		}

		return Redirect::to("admin/posts/$id/edit")->with('status_update', 'post updated');

	}

	// delete post - DELETE
	public function action_delete($id){
		
		if(Auth::check()){
			$post = Post::find($id);
			$a = $post->delete();
			
			if(!$a){
				Log::write('admin.posts.delete', 'failed to delete single post, post->delete() return false');
				return Redirect::to('admin/posts')->with('error_delete', 'post could not be deleted');
			}

			return Redirect::to('admin/posts')->with('status_delete', 'Post was deleted');
		}

	}

	



	private function slugger($title){
		$a = explode(' ', $title);

		foreach($a as &$t){
			if(strpos($t, '-')){
				explode(' ', $t);	
			}
		}

		if(count($a) > 5){
			$a = array_slice($a, 0, 4);
		}

		$f = implode('-', $a);

		$p = Post::order_by('created_at', 'desc')->first();
		$f .= "-".($p->id + 1);

		return $f;

	}





}