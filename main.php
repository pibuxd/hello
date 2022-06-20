<?php
	session_start();
	if (isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		require_once "db.php";

		if (isset($_POST['note_add']))
		{
			add_user_note($db, $user['id_user'], $_POST['note_title'], $_POST['note_body']);
		}
	}
	else
	{
		header("location: login.php");
		exit();
	}
	require_once "db.php";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Hi!</h1>
	<p>You are logged as: <?php echo "<b>".$user['username']."</b>" ?></p>

	<input type="button" value="Logout" class="btn btn-dark" id="btnHome" 
	onClick="document.location.href='logout.php'" /><br>

	<input type="button" value="Remove yourself from the database" class="btn btn-info" id="btnHome" 
	onClick="document.location.href='deletefromdb.php'" /><br>

	<input type="button" value="List of all users" class="btn btn-secondary" id="btnHome" 
	onClick="document.location.href='list.php'" /><br>

	<br> <br>
	<div>
		<form action="main.php" method="POST">
			<input type="text" autocomplete="off" name="note_title" did="note_title" placeholder="Title of note...">
			<br>
			<textarea rows="5" cols="60" autocomplete="off" name="note_body" placeholder="Content of your note..."></textarea>
			<br>
			<input type="submit" value="Add note" name="note_add" class="btn btn-success">
		</form>
	</div>

	<br><br>
	<h2>My notes:</h2>
	<?php 
		$notes = get_user_notes($db, $user['id_user']);
		foreach ($notes as $note)
		{
			echo "<hr>";
			echo "<h5>".$note['title'].":</h5>";
			$str = str_split($note['note']);
			foreach ($str as $c)
			{
				if ($c == PHP_EOL)
				{
					echo "<br>";
				}
				echo $c;
			}
		}
	?>
</body>
</html>