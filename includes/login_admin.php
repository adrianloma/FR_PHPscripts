<?php
	session_start();
	//blowfish encryption class
	require('C:\xampp\htdocs\FreedomRun\Blowfish\blowfish.class.php');

	$HOST="localhost";
	$USER="root";
	$PSW="";
	$DB="prueba";

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	

	//connection if there is a username and password exist
	if($username && $password){

		$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
		$query = mysqli_query($connect,"SELECT * FROM district WHERE email='$username'");
		$numrows = mysqli_num_rows($query);

		//if username is found in the db.
		if($numrows==1){

			//fetches query into associative array
			$array = $query->fetch_assoc();

			//creates a Bcrypt object
			$bcrypt= new Bcrypt(4);

			//uses Bcrypt method to verify if the password matches the database password
			if($bcrypt->verify($password,$array['password'])){
				$_SESSION['CurrentUser'] = $username;
				$_SESSION['CurrentName'] = $array['name'];
				header("Location: ../pages/main_admin.php");
    			exit;
			}else{
				echo "Invalid password";
			}

			
		}else{
			echo "Invalid username";
			die();
		}

	}else{
		die("Please enter a valid username and a password.");
	}


?>