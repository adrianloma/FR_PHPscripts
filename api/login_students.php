<?php
	//blowfish encryption class
	require('C:\xampp\htdocs\FreedomRun\Blowfish\blowfish.class.php');

	$HOST="173.194.252.10";
	$USER="andres";
	$PSW="andres";
	$DB="FreedomRun";

	if(isset($_POST['username']) && isset($_POST['password'])){
		//$username = $_POST['username'];
		//$password = $_POST['password'];
	}
	
	$username = "asdfghnm";
	$password = "123456";
	
	//connection if there is a username and password exist
	if($username && $password){

		$connect = mysqli_connect($HOST,$USER,$PSW,$DB);
		$query = mysqli_query($connect,"SELECT * FROM students WHERE email='$username'");
		$numrows = mysqli_num_rows($query);

		//if username is found in the db.
		if($numrows==1){

			//fetches query into associative array
			$array = $query->fetch_assoc();

			//creates a Bcrypt object
			$bcrypt= new Bcrypt(4);

			//uses Bcrypt method to verify if the password matches the database password
			if($bcrypt->verify($password,$array['password'])){
				//falta agregar progress p1 y progress por pregunta al xml
				
				$stringXML = "
					<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
					<xml>
						
						<errorCode>0</errorCode>
						<email>$array[email]</email>
						<fname>$array[fname]</fname>
						<lname>$array[lname]</lname>
						<gender>$array[gender]</gender>
						<language>$array[language]</language>
						<sound>$array[sound]</sound>
						<avatar>$array[avatar]</avatar>
					</xml>
					";
				echo $stringXML;	
			}else{
				$stringXML = "
					<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
					<xml>
						
						<errorCode>1</errorCode>
					</xml>
					";
				echo $stringXML;
			}

			
		}else{
			$stringXML = "
					<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
					<xml>
						
						<errorCode>1</errorCode>
					</xml>
					";
			echo $stringXML;
			
		}

	}else{
		$stringXML = "
					<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
					<xml>
						
						<errorCode>1</errorCode>
					</xml>
					";
		echo $stringXML;
	}


?>


