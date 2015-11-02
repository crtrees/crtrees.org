<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>Tree Info:</h1>
		<hr />
		<?php
			require 'dbapi.php';
			$treeid = intval($_GET[id]);
			$tree = dbReadTree($treeid);
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
