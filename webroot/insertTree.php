<?php

require 'dbapi.php';

print_r($_POST);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["leaf_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["leaf_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["leaf_image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["leaf_image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

dbAddTree(new Tree($_POST[species], $_POST[health], $_POST[height], $_POST[latitude], $_POST[longitude], $target_file));

	/*$con = new PDO('mysql:host=crtreesorg.fatcowmysql.com;dbname=crtrees',"crtreesadmin","G0whalephants1!");
	$q = $con->prepare("INSERT INTO `trees` (`Species`, `Height`, `Lat`, `Long`, `Health`, `LeafIMG`) VALUES (:Species, :Height, $_POST[latitude], $_POST[longitude], '$_POST[health]', :file)");
	$q->bindParam(':Species', $_POST[species], PDO::PARAM_INT);
	$q->bindParam(':Height', $_POST[height], PDO::PARAM_INT);
	$q->bindParam(':file', $target_file, PDO::PARAM_INT);
	$q->execute();
	$con->errorInfo();
	$con = NULL;*/
?>
