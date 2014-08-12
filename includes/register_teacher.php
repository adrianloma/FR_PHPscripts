<?php
session_start();
require('C:\xampp\htdocs\FreedomRun\Blowfish\blowfish.class.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$teacher_id = $_POST['teacher_id'];
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

	//Lastname validation
	if($teacher_id==''){
		$_SESSION['message']="Please enter a Student ID";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}

	//Email validation
	if($email==''){
		$_SESSION['message']="Please enter an email";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}


	//Database connection params
	$HOST="localhost";
	$USER="root";
	$PSW="";
	$DB="prueba";


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
	$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
	
	//Student ID Validation
	$query = mysqli_query($connect,"SELECT * FROM teachers WHERE teacher_id='$teacher_id'");
	$numrows = mysqli_num_rows($query);

	//Checks if validation code exists in the database
	if($numrows==1){
		$_SESSION['message']="Teacher ID is taken.";
		header("Location: ../pages/main_admin.php?page=AddTeacher");
		exit;
	}

	//Checks if teacher already exists in database
	$query = mysqli_query($connect,"SELECT * FROM teachers WHERE email='$email'");
	$numrows = mysqli_num_rows($query);

	if($numrows==0){
		//students table
		$insert = mysqli_query($connect,
			"INSERT INTO teachers (email, teacher_id, fname, lname,password)
				VALUES ('$email','$teacher_id','$fname','$lname','$password');"
				
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