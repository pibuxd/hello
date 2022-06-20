<?php
	if (isset($_SESSION["logged"]) && $_SESSION["logged"]===true)
	{
		header("location: main.php");
		exit();
	}
	
	require_once "db.php";
	
	if (isset($_POST["username"]) && isset($_POST["password"]))
	{	
		$username = trim($_POST["username"]);
		$password = $_POST["password"];
	
		$user = create_user($db, $username, $password);

        session_start();
        $_SESSION['logged']=true;
        $_SESSION['user']=$user;

        header("location: main.php");
        exit;
	}
	
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Register page</h1>

<form action="register.php" method="POST">
	<label for="inputUserName">Username: </label><br>
	<input type="text" autocomplete="off" name="username" id="inputUserName" />
	<br>
	<label for="inputPassword">Password: </label><br>
	<input type="password" autocomplete="off" name="password" id="inputPassword" />
	<br>
	<input type="submit" class="btn btn-primary" value="Register" />
</form>
<?php
if (isset($error)) echo "<p style=\"color:red\">" . $error . "</p>";
?>
</body>
</html>