<html>
	<form action="registration.php" method= "POST">
		Username </br> <input type= "text" name= "username"></br>
		Password </br> <input type= "password" name= "pwd1"></br>
		Re-enter Password </br> <input type= "password" name= "pwd2"></br>
		Email </br> <input type= "text" name= "email"></br>
		First Name </br> <input type= "text" name= "fname"></br>
		Last Name </br> <input type= "text" name= "lname"></br>
		<input type= "submit" value= "Register">
	</form>
</html>

<?php
	$server = "localhost";
	$db = "camagrudb";
	$usr = "root";
	$pwd = "hmkabela";
	$user_name = $_POST['username'];
	$passwd = $_POST['pwd1'];
	$emailAdd = $_POST['email'];
	$f_name = $_POST['fname'];
	$l_name = $_POST['lname'];

	try
	{
		$conn = new PDO("mysql:host=$server;dbname=$db", $usr, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (!empty($_POST['username']) && !empty($_POST['pwd1']) && !empty($_POST['pwd2']) && !empty($_POST['email']) && !empty($_POST['fname']) && !empty($_POST['lname']))
		{
			if (isset($_POST['username']) && isset($_POST['pwd1']) && isset($_POST['pwd2']) && isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']))
			{
				if ($passwd == $_POST['pwd2'])
				{
					$d = date("Y-m-d");
					$sql = 'insert into users(username, passwd, email, fname, lname, joindate) VALUES(?, ?, ?, ?, ?, ?)';
					//$sql = "INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
					$stmt = $conn->prepare($sql);
					$stmt->execute([$user_name,$passwd,$emailAdd,$f_name,$l_name, $d]);
					echo	'Verify Your Account On The Email You Have Received';
				}
				else
				{
					echo	"Passwords do not match!!! \n";
				}
			}
		}
		else
		{
			echo	"Please fill in all fields \n";
		}
	}
	catch (PDOException $e)
	{
		echo "Connection Failure!!!";
	}
	$conn = null;
?>
