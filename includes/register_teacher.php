<?php
//Database connection params
$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";

session_start();
require('..\Blowfish\blowfish.class.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$validation_code = $_POST['validation_code'];
	
	
	
	//First name validation
	if($fname==''){
		$_SESSION['message']="Please enter a First Name.";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}

	//Lastname validation
	if($lname==''){
		$_SESSION['message']="Please enter a Last Name";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}



	//Email validation
	if($email==''){
		$_SESSION['message']="Please enter an email";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}




	//Password validation
	if($password==''){
		$_SESSION['message']="Please enter a password.";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}
	if($password != $password2){
		$_SESSION['message']="Passwords mismatch, please try again.";
		header("Location: main_admin.php?page=AddTeacher");
		exit;
	}
	


	//Password encryption
	$bcrypt = new Bcrypt(4);
	$password = $bcrypt->hash($password);

	//database connection
	//$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
	
	require('connect.php');
	
	//Checks if teacher already exists in database
	$query = mysqli_query($connect,"SELECT * FROM teachers WHERE email='$email'");
	$numrows = mysqli_num_rows($query);

	if($numrows==0){
		//students table
		$insert = mysqli_query($connect,
			"INSERT INTO teachers (email, fname, lname,password,district_email)
				VALUES ('$email','$fname','$lname','$password','$_SESSION[CurrentUser]' );"
				
		)or die(mysqli_error($connect));

		$_SESSION['message']="Teacher succesfully added.";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
		
	}else{
		$_SESSION['message']="Teacher was no succesfully added.";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}

?>