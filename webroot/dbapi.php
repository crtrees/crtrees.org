<?php

require 'tree.php';
require 'log.php';

function dbConnect()
{
	return new PDO('mysql:host=crtreesorg.fatcowmysql.com;dbname=crtrees',"crtreesadmin","G0whalephants1!");
}

function dbAddTree($tree)
{
	$conn = dbConnect();
	$query = $conn->prepare("INSERT INTO `trees` (`Species`, `Lat`, `Long`) 
		VALUES (:Species, :Latitude, :Longitude");
	$query->bindParam(':Species', $tree->species, PDO::PARAM_INT);
	$query->bindParam(':Latitude', $tree->latitude, PDO::PARAM_INT);
	$query->bindParam(':Longitude', $tree->longitude, PDO::PARAM_INT);
	$query->execute();
	$conn = NULL;
}

function dbAddLog($log)
{
	$conn = dbConnect();
	$query = $conn->prepare("INSERT INTO `logs` ('tree', 'height', 'health', 'image', 'comment')
		VALUES (:tree, :height, :health, :image, :comment)");
	$query->bindParam(':tree', $log->tree, PDO::PARAM_INT);
	$query->bindParam(':height', $log->height, PDO::PARAM_INT);
	$query->bindParam(':health', $log->health, PDO::PARAM_INT);
	$query->bindParam(':image', $log->image, PDO::PARAM_INT);
	$query->bindParam(':comment', $log->comment, PDO::PARAM_INT);
	$query->execute();
	$conn = NULL;
}

function dbReadAll()
{
	$conn = dbConnect();
	$query = $conn->prepare("SELECT * FROM `trees`");
	$query->execute();
	return $query->fetchAll();
}

function dbReadLogs($treeID)
{
	$conn = dbConnect();
	$query = $conn->prepare("SELECT * FROM `logs` WHERE tree=:id");
	$query->bindParam(':id', $treeID, PDO::PARAM_INT);
	$query->execute();
	return $query->fetchAll();
}

function dbReadTree($id)
{
	$conn = dbConnect();
	$query = $conn->prepare("SELECT * FROM `trees` WHERE ID=:id LIMIT 1");
	$query->bindParam(':id', $id, PDO::PARAM_INT);
	$query->execute();
	$result = null;
	echo $query->rowCount();
	if($query->rowCount() > 0)
	{
		$row = $query->fetch();
		$result = new Tree($row[Species], $row[Lat], $row[Long]);
	}
	return $result;
}

?>
