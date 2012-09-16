<?php 

class Admin_Pages_Controller extends Base_Controller{

	public $final = array();

	public function action_index(){
		$pages = Page::order_by('order', 'asc')->get();
		return View::make('admin.pages.all')->with('pages', $pages);
	}

	public function action_edit($id){
		$page = Page::find($id);
		$pages = Page::all();
		$tree = $this->createTree($pages);

		return View::make('admin.pages.edit')->with('page', $page)->with('pages', $tree);
	}

	public function action_show($id){
		if(is_numeric($id)){
			$page = Page::where('id', '=', $id)->first();
		} else {	
			$page = Page::where('slug', '=', $id)->first();
		}

		if ($page){
			return View::make('admin.pages.show')
						 ->with('content', $page);
		} 
			return Response::error('404');
	}

	public function action_new(){
		$pages = Page::all();

		$tree = $this->createTree($pages);
		
		return View::make('admin.pages.new')->with('pages', $tree);
	}

	public function action_order(){
		$p = Page::order_by('order', 'asc')->get();
		return View::make('admin.pages.order')->with('pages', $p);
	}

	public function action_save(){
		$a = Input::get('order');

		for($i = 0; $i < count($a); $i++){
			$p = Page::where("id", "=", $a[$i])->first();
			$p->order = $i + 1;
			$p->save();
		}

		$status = "Order Saved!";

		return Response::make("order Saved"); 
	}

	public function action_update($id){
			

			$post_page = (Input::get('postpage')) ? 1 : 0;
			$page = Page::where('page_name', '=', str_replace('-', '', Input::get('sub')))->first();
			$order = Page::order_by('created_at', 'desc')->first();		
			$level = (Input::get('subpage')) ? $page->level + 1 : 0;
			$parent = (Input::get('subpage')) ? $page->slug : 'none';
			$slug = $this->slugger(Input::get('title'));

			$oldpage = Page::find($id);
			$oldpage->page_name = Input::get('title');
			$oldpage->page_content = Input::get('content');
			$oldpage->level = $level; 
			$oldpage->parent = $parent;
			$oldpage->post_page = $post_page;
			$success = $oldpage->save();
			
			if(Input::get('subpage')){
				$p = Page::where('page_name', '=', str_replace('-', '', Input::get('sub')))->first();
				$p->has_child = '1';
				$p->save();
			}
			if(!$success){
				Log::write('/admin/pages/:id/edit', 'could not update page - $oldpage->save returned false');
				return Redirect::to("admin/pages/$oldpage->id/edit")->with('error_update', 'page could not be updated');
			}

			return Redirect::to("admin/pages/$oldpage->id/edit")->with('status_update', 'page updated');
	}

	public function action_create(){

			$post_page = (Input::get('postpage')) ? 1 : 0;
			$page = Page::where('page_name', '=', str_replace('-', '', Input::get('sub')))->first();
			$order = Page::order_by('created_at', 'desc')->first();		
			$level = (Input::get('subpage')) ? $page->level + 1 : 0;
			$parent = (Input::get('subpage')) ? $page->slug : 'none';
			$slug = $this->slugger(Input::get('title'));

			$input = array(
					'page_name' => Input::get('title'),
					'page_content' => Input::get('content'),
					'level' => $level,
					'order' => ($order->order + 1),
					'slug' => $slug,
					'parent' => $parent,
					'has_child' => 0,
					'post_page' => $post_page
				);

			$success = Page::create($input);
			if(Input::get('subpage')){
				$p = Page::where('page_name', '=', str_replace('-', '', Input::get('sub')))->first();
				$p->has_child = '1';
				$p->save();
			}
			
			if(!$success){
			Log::write('admin.pages.create', 'Page was not created, page->create() returned false.');
			 return Redirect::to('/admin/pages/new')
		                 ->with('error_create', 'Unable to create page!');
			}   

			return Redirect::to('/admin/pages/new')
		                 ->with('status_create', 'New Page Created')
					     ->with('id', $success->id);
			
			
	}

	public function action_delete($id){
		echo "delete file";
		// logic to delete file.
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

		return $f;

	}

	private function createTree($pages){
		foreach($pages as $page){
			$slug = $page->slug;
			if($page->has_child){
				if($page->level == 0){
					$final[] = $page->page_name;
				}
				$children = Page::where('parent', '=', $slug)->get();
				foreach($children as $sub){
					$slug2 = $sub->slug;
					if($sub->level == 1){
						$g = "-";
						$g .= $sub->page_name;
						$final[] = $g;
					} 	
					if($sub->has_child){
						$children2 = Page::where('parent', '=', $slug2)->get();
						foreach($children2 as $sub2){
				
							if ($sub2->level == 2) {
								$g = "--";
							}
				
							$g .= $sub2->page_name; 
							$final[] = $g;
				
						}	
					} 

				}

			} else {
				if($page->level == 0){
					$final[] = $page->page_name;
				}
			}	
		}
		return $final;
	}

}