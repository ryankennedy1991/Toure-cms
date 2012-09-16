<?php

class User extends Eloquent 
{
	public function posts()
	{
		$this->has_many('Post');
	}

	public function images()
	{
		$this->has_many('Image');
	}
}