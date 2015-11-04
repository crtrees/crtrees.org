<?php

require 'dbapi.php';

print_r($_POST);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["leaf_image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
	if(getimagesize($_FILES["leaf_image"]["tmp_name"]) !== false)
	{
		if (move_uploaded_file($_FILES["leaf_image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["leaf_image"]["name"]). " has been uploaded.";
			$loggedtree = new Tree($_POST[species], $_POST[latitude], $_POST[longitude]);
			$newtree = dbIsTreeNew($loggedtree);
			if($newtree === true)
			{
				dbAddTree($loggedtree);
			}
			else
			{
				dbAddLog(new Log($newtree, $_POST[height], $_POST[health], $target_file, $_POST[comment]));
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	else
	{
		echo "Sorry, your file was not uploaded.";
	}
}
?>
