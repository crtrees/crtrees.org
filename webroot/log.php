<?php

class Log
{
	public $tree;
	public $height;
	public $health;
	public $image;
	public $comment;
	
	function __construct($tre, $hei, $hea, $img, $com)
	{
		$this->tree = $tre;
		$this->height = $hei;
		$this->health = $hea;
		$this->image = $img;
		$this->comment = $com;
	}
}

?>
