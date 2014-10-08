<?php

require('blowfish.class.php');


	//POST
	if(isset($_POST['xml'])){
		$stringXML = $_POST['xml'];
	}

	//STRING TO XML
	$xml = simplexml_load_string($stringXML);
	
	$fname = $xml->fname;
	$lname = $xml->lname;
	$password = $xml->password;
	$gender = $xml->gender;
	$email = $xml->email;
	$validation_code = $xml->validation_code;
	$student_id = $xml->student_id;
	$sound= $xml->sound;
	$language= $xml->language;
	$avatar= $xml->avatar;

	$bcrypt = new Bcrypt(4);
	$password = $bcrypt->hash($password);



		require('connect.php');
		
		$query = mysqli_query($connect,"SELECT * FROM students WHERE email='$email'");
		$numrows = mysqli_num_rows($query);

		if($numrows < 1 || true){
			$insert = mysqli_query($connect,
				"INSERT INTO students (email, student_id, validation, fname, lname, gender, language, sound, avatar, password, currentModule, currentLevel)
					VALUES ('$email','$student_id','$validation_code','$fname','$lname','$gender','$language','$sound','$avatar','$password', 0 ,0);"
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