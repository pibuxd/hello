<?php
	$db_user="www";
	$db_password="1234";

	function get_user($db, $username)
	{
		$sql = "SELECT id_user, username, password FROM users WHERE username = :username";
		if ($stmt = $db->prepare($sql))
		{
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			if ($stmt->execute())
			{
				if ($stmt->rowCount() == 1)
				{
						$row = $stmt->fetch();
						return $row;
				}
			}
		}
		return false;
	}

	function create_user($db, $username, $password)
	{
		$sql = "INSERT into users(username, password) values (:username, :password);";
		if ($stmt = $db->prepare($sql))
		{
			$password = md5($password);
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();
		}

		return get_user($db, $username);
	}

	function delete_user($db, $username)
	{
		$sql ="DELETE FROM users WHERE username = :username";
		if ($stmt = $db->prepare($sql))
		{
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();
		}
	}

	function list_users($db)
	{
		$sql = "SELECT * FROM users";
		if ($stmt = $db->prepare($sql))
		{
			$stmt->execute(); 
			return $stmt;
		}
	}

	function get_user_notes($db, $id_user)
	{
		$sql = "SELECT id_note, title, note, date FROM notes WHERE id_user = :id_user";
		if ($stmt = $db->prepare($sql))
		{
			$stmt->bindParam(":id_user", $id_user, PDO::PARAM_INT);
			if ($stmt->execute())
			{
				$result = $stmt->fetchAll();
				return $result;
			}
		}
		return false;
	}

	function add_user_note($db, $id_user, $title, $note)
	{
		$sql = "INSERT into notes(title, note, date, id_user) values (:title, :note, now(), :id_user);";
		if ($stmt = $db->prepare($sql))
		{
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":note", $note, PDO::PARAM_STR);
			$stmt->bindParam(":id_user", $id_user, PDO::PARAM_INT);
			$stmt->execute();
		}
	}

	try {
		$db = new PDO("mysql:host=localhost;dbname=hello", $db_user, $db_password);
	}
	catch(PDOException $e) {
		die("ERROR: " . $e->getMessage());
	}
?>