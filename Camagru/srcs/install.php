<?php
	$server = "localhost";
	$db = "camagru";
	$usr = "root";
	$pwd = "hmkabela";

	try
	{
		$conn = new PDO("mysql:host=$server;dbname=$db", $usr, $pwd);
		echo "connected successfully";
	}
	catch (PDOException $e)
	{
		echo "connection failed";
	}
?>
if (!empty(isset($_POST['username'])) && !empty(isset($_POST['pwd1')) && !empty(isset($_POST['pwd2'])) && !empty(isset($_POST['email'])) && !empty(isset($_POST['fname'])) && !empty(isset($_POST['lname'])))
