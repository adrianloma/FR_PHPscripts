<?php
session_start();
require('C:\xampp\htdocs\FreedomRun\Blowfish\blowfish.class.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$student_id = $_POST['student_id'];
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

	//Lastname validation
	if($student_id==''){
		$_SESSION['message']="Please enter a Student ID";
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


	//Database connection params
	$HOST="localhost";
	$USER="root";
	$PSW="";
	$DB="prueba";


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
	$password = $bcrypt->hash($password);

	//database connection
	$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
	
	//Student ID Validation
	$query = mysqli_query($connect,"SELECT * FROM students WHERE student_id='$student_id'");
	$numrows = mysqli_num_rows($query);

	//Checks if validation code exists in the database
	if($numrows==1){
		$_SESSION['message']="Student ID is taken.";
		header("Location: ../pages/main.php?page=AddStudent");
		exit;
	}

	//Validation code query
	$query = mysqli_query($connect,"SELECT * FROM validations WHERE validation='$validation_code'");
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

	if($numrows==0){
		//students table
		$insert = mysqli_query($connect,
			"INSERT INTO students (email, student_id, validation, fname, lname, gender, language, sound, avatar, password)
				VALUES ('$email','$student_id','$validation_code','$fname','$lname','$gender','$language','$sound','$avatar','$password');"
				
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