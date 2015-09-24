<?php

class Tree
{
	public $species;
	public $health;
	public $height;
	public $latitude;
	public $longitude;
	public $image;
	
	public __construct()
	{
		$species = "Oak";
		$health = "g";
		$height = 20;
		$latitude = 0;
		$longitude = 0;
		$image = "";
	}
	
	public __construct($spe, $hea, $hei, $lat, $lon, $ima)
	{
		$species = $spe;
		$health = $hea;
		$height = $hei;
		$latitude = $lat;
		$longitude = $lon;
		$image = $ima;
	}
}

function dbConnect()
{
	return new PDO('mysql:host=crtreesorg.fatcowmysql.com;dbname=crtrees',"crtreesadmin","G0whalephants1!");
}

function dbAddTree($tree)
{
	$conn = dbConnect();
	$query = $conn->prepare("INSERT INTO `trees` (`Species`, `Height`, `Lat`, `Long`, `Health`, `LeafIMG`) 
		VALUES (:Species, :Height, :Latitude, :Longitude, :Health, :file)");
	$query->bindParam(':Species', $tree->species, PDO::PARAM_INT);
	$query->bindParam(':Height', $tree->height, PDO::PARAM_INT);
	$query->bindParam(':Health', $tree->health, PDO::PARAM_INT);
	$query->bindParam(':Latitude', $tree->latitude, PDO::PARAM_INT);
	$query->bindParam(':Longitude', $tree->longitude, PDO::PARAM_INT);
	$query->bindParam(':file', $tree->image, PDO::PARAM_INT);
	$query->execute();
	$conn = NULL;
}

function dbReadAll()
{
	$conn = dbConnect();
	$query = $conn->prepare("SELECT * FROM 'trees'");
	$query->execute();
	return $query->fetchAll();
}

?>
