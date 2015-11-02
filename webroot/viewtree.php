<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>Tree Info:</h1>
		<hr />
		<?php
			require 'dbapi.php';
			$tree = dbReadTree($_GET[id]);
			if($tree == null)
			{
				echo "There is no tree with ID $_GET[id]";
			}
			else
			{
				echo $tree->species;
			}
		?>
	</body>
</html>
