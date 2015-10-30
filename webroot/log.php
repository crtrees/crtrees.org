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
		$tree = $tre;
		$height = $hei;
		$health = $hea;
		$image = $img;
		$comment = $com;
	}
}

?>
