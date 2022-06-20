<?php
session_start();
if (isset($_SESSION['user']))
{
	header("location: main.php");
}
else
{
	header("location: login.php");
}
exit();
?>