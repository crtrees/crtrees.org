<html>
	<head>
	</head>
	<body>
		<?php
			require 'dbapi.php';
			$tree = dbReadTree($id);
			if($tree == null)
			{
				echo "This tree does not exist :C";
			}
			else
			{
				echo "<img src=$tree->image alt=leaf />";
				echo "Species: $tree->species <br />";
				echo "Health: $tree->health <br />";
				echo "Height: $tree->height ft <br />";
				echo "Location: $tree->latitude, $tree->longitude <br />";
			}
		?>
	</body>
</html>
