<?php

class Tree
{
	public $species;
	public $latitude;
	public $longitude;
	
	function __construct($spe, $lat, $lon)
	{
		$species = $spe;
		$latitude = $lat;
		$longitude = $lon;
	}
}

?>
