<?php

class Post extends Eloquent 
{
	public function image(){
		return $this->has_one('Image');
	}

	public function user()
	{
		return $this->belongs_to('User');
	}

}