<?php

class Post extends Eloquent 
{
	public function image(){
		$this->has_one('Image');
	}

	public function user()
	{
		$this->belongs_to('User');
	}

}