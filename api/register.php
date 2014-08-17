<?php

require('blowfish.class.php');

$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";



	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$validation_code = $_POST['validation_code'];
	$student_id = $_POST['student_id'];
	$sound= $_POST['sound'];
	$language= $_POST['language'];
	$avatar= $_POST['avatar'];


	

	$bcrypt = new Bcrypt(4);
	$password = $bcrypt->hash($password);



		require('connect.php');
		
		$query = mysqli_query($connect,"SELECT * FROM students WHERE email='$email'");
		$numrows = mysqli_num_rows($query);

		if($numrows==1){
			$insert = mysqli_query($connect,
				"INSERT INTO students (email, student_id, validation, fname, lname, gender, language, sound, avatar, password)
					VALUES ('$email','$student_id','$validation_code','$fname','$lname','$gender','$language','$sound','$avatar','$password');"
			);

			$insert = mysqli_query($connect,
			"INSERT INTO updates(student_email)
				VALUES ('$email');"
				
			);

			//info screens
			$insert = mysqli_query($connect,
				"INSERT INTO info_screens(student_email)
					VALUES ('$email');"
					
			);

			//questions_s1_m1
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m1 (student_email)
					VALUES ('$email');"
					
			);
			//questions_s1_m2
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m2 (student_email)
					VALUES ('$email');"
					
			);
			//questions_s1_m3
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m3 (student_email)
					VALUES ('$email');"
					
			);

			//questions_s1_m4
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m4 (student_email)
					VALUES ('$email');"
					
			);
			//questions_s1_m5
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m5 (student_email)
					VALUES ('$email');"
					
			);
			//questions_s1_m6
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m6 (student_email)
					VALUES ('$email');"
					
			);
			//questions_s1_m7
			$insert = mysqli_query($connect,
				"INSERT INTO questions_s1_m7 (student_email)
					VALUES ('$email');"
					
			);

		
			
		}else{
			//account exists in database
			echo "false";
		}

?>