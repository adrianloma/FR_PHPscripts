<?php

require('Blowfish/blowfish.class.php');

$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";


/*
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$validation_code = $_POST['validation_code'];
	$student_id = $_POST['student_id'];

	$sound=1;
	$language=0;
	$avatar=1;
*/

	
	$fname = "Jose";
	$lname = "Ramones";
	$password = "000000";
	$gender = "M";
	$email = "jramones@gmail.com";
	$validation_code = "AG1122";
	$student_id = 1;

	$sound=1;
	$language=0;
	$avatar=1;

	

	$bcrypt = new Bcrypt(4);
	$password = $bcrypt->hash($password);



		//$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
		
		require('connect.php');

		$query = mysqli_query($connect,"SELECT * FROM teachers WHERE email='$email'");
		$numrows = mysqli_num_rows($query);

		if($numrows==1){
			$insert = mysqli_query($connect,
				"INSERT INTO students (email, student_id, validation, fname, lname, gender, language, sound, avatar, password)
					VALUES ('$email','$student_id','$validation_code','$fname','$lname','$gender','$language','$sound','$avatar','$password');"
			)or die(mysqli_error($connect));
		
			
		}else{
			die("Account is already registered");
		}

?>