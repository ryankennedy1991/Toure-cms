<?php

class Image extends Eloquent 
{
	public function user()
	{
		$this->belongs_to('User');
	}

	public function post()
	{
		$this->belongs_to('Post');
	}

}