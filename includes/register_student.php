<?php
session_start();
require('../Blowfish/blowfish.class.php');

$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";


	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$validation_code = $_POST['validation_code'];
	


	//Gender selection validation
	if(isset($_POST['male'])){
		$gender = 'M';
	}else if(isset($_POST['female'])){
		$gender = 'F';
	}else{
		//sends error through session

		$_SESSION['message']="Please select a gender.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}
	
	
	//First name validation
	if($fname==''){
		$_SESSION['message']="Please enter a First Name.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}

	//Lastname validation
	if($lname==''){
		$_SESSION['message']="Please enter a Last Name";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}

	//Email validation
	if($email==''){
		$_SESSION['message']="Please enter an email";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}

	$sound=1;
	$language=0;
	$avatar=1;





	//Password validation
	if($password==''){
		$_SESSION['message']="Please enter a password.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}
	if($password != $password2){
		$_SESSION['message']="Passwords mismatch, please try again.";
		header("Location: main.php?page=AddStudent");
		exit;
	}
	


	//Password encryption
	$bcrypt = new Bcrypt(4);
	$password = password_hash($password, PASSWORD_BCRYPT);//$bcrypt->hash($password);

	//database connection
	//$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
	
	require('connect.php');

	//Validation code query
	$query = mysqli_query($connect,"SELECT * FROM validations WHERE validation='$validation_code' and teacher_email='$_SESSION[CurrentUser]'");
	$numrows = mysqli_num_rows($query);

	//Checks if validation code exists in the database
	if($numrows==0){
		$_SESSION['message']="Wrong validation code.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}

	//Checks if student already exists in database
	$query = mysqli_query($connect,"SELECT * FROM students WHERE email='$email'");
	$numrows = mysqli_num_rows($query);

	$query2 = mysqli_query($connect,"SELECT COUNT(email) as num FROM students;");

	$count = mysqli_fetch_assoc($query2);

	$student_id = $count['num'];
	$student_id +=1;

	if($numrows==0){
		//students table
		$insert = mysqli_query($connect,
			"INSERT INTO students (email,student_id, validation, fname, lname, gender, language, sound, avatar, password)
				VALUES ('$email','$student_id','$validation_code','$fname','$lname','$gender','$language','$sound','$avatar','$password');"
				
		)or die(mysqli_error($connect));

		//info screens
		$insert = mysqli_query($connect,
			"INSERT INTO info_screens(student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));

		//questions_s1_m1
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m1 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));
		//questions_s1_m2
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m2 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));
		//questions_s1_m3
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m3 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));

		//questions_s1_m4
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m4 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));
		//questions_s1_m5
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m5 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));
		//questions_s1_m6
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m6 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));
		//questions_s1_m7
		$insert = mysqli_query($connect,
			"INSERT INTO questions_s1_m7 (student_email)
				VALUES ('$email');"
				
		)or die(mysqli_error($connect));

		$_SESSION['message']="Student succesfully added.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;

		
		
	}else{
		$_SESSION['message']="Student was no succesfully added.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}

?>