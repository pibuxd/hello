
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h2>List of all users:</h2>
	<?php
		require_once "db.php";
		$lista = list_users($db);

		$licz = 1;
		if ($lista->rowCount() > 0) {
			while($row = $lista->fetch()) {
				echo "<hr>";
				echo "<b>".$licz++."</b>" . ": ";
				echo $row['username'] . "\t" ."<br>";
			}
		} 
		else {
			echo "0 users";
		}
	?>
	<br>
	<input type="button" value="Home" class="btn btn-info" id="btnHome" 
	onClick="document.location.href='main.php'" />
</body>
</html>