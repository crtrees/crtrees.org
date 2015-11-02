<?php

class Tree
{
	public $species;
	public $latitude;
	public $longitude;
	
	function __construct($spe, $lat, $lon)
	{
		$this->species = $spe;
		$this->latitude = $lat;
		$this->longitude = $lon;
	}
}

?>
