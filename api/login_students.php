<?php
	//blowfish encryption class
	require('../Blowfish/blowfish.class.php');

	$HOST="173.194.252.10";
	$USER="root";
	$PSW="laracroft";
	$DB="FreedomRun";

	// if(isset($_POST['username']) && isset($_POST['password'])){
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// }

	//$connect = mysqli_connect($HOST,$USER,$PSW,$DB);

	
	require('connect.php');;

	$username = "andresgtz79@gmail.com";
	$password = "123456";
	
	//connection if there is a username and password exist
	if($username && $password){

		
		//$query = mysqli_query($connect,"SELECT * FROM students WHERE email='$username'");
		$query = $connect -> query("SELECT * FROM students WHERE email='$username'");
		echo "SELECT * FROM students WHERE email='$username'";
		$array = mysqli_fetch_assoc($query);
		$numrows = mysqli_num_rows($query);

		//if username is found in the db.
		if($numrows==1 || true){

			//fetches query into associative array
			$array = mysqli_fetch_assoc($query);

			//creates a Bcrypt object
			$bcrypt= new Bcrypt(4);
//			
			echo $array["password"]."password php";
			echo $_POST["password"]."password post";
			//uses Bcrypt method to verify if the password matches the database password
			if(password_verify($array["password"], $password)){
				//falta agregar progress p1 y progress por pregunta al xml

				$query2 = mysqli_query($connect,
				"SELECT *
				 FROM questions_s1_m1 q1,questions_s1_m2 q2, questions_s1_m3 q3, questions_s1_m4 q4, questions_s1_m5 q5, questions_s1_m6 q6, questions_s1_m7 q7
				 WHERE q1.student_email = '$username' and q1.student_email = q2.student_email and q2.student_email = q3.student_email and q3.student_email = q4.student_email 
				 		and q4.student_email = q5.student_email and q5.student_email = q6.student_email and q6.student_email = q7.student_email; 
				");

				$questions = mysqli_fetch_assoc($query2);
				
				$query3 = mysqli_query($connect,
					"SELECT *
					 FROM info_screens
					 WHERE student_email='$username';
					");
				$screens = mysqli_fetch_assoc($query3);

				$stringXML = <<<XML
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
	<currentModule></currentModule>
	<currentLevel></currentLevel>
	<pantallasInforamtivas>
		<p>$screens[screen_1]</p>
		<p>$screens[screen_2]</p>
		<p>$screens[screen_3]</p>
		<p>$screens[screen_4]</p>
		<p>$screens[screen_5]</p>
		<p>$screens[screen_6]</p>
		<p>$screens[screen_7]</p>
		<p>$screens[screen_8]</p>
		<p>$screens[screen_9]</p>
		<p>$screens[screen_10]</p>
		<p>$screens[screen_11]</p>
		<p>$screens[screen_12]</p>
	</pantallasInforamtivas>
	<Levels>
XML;
				for($i=1;$i<139;$i++){
					if($i==1 or $i==24 or $i==48 or $i==69 or $i==91 or $i==112 or $i==128 ){
						$stringXML .= "<Level>";
					}
						$right = "q".$i."_right";
						$wrong = "q".$i."_wrong";
					$stringXML .=  "

							<Question>
								<questionNumber>$i</questionNumber>
								<correct>$questions[$right]</correct>
								<incorrect>$questions[$wrong]</incorrect>
							</Question>
					";
					if($i==23 or $i==47 or $i==68 or $i==90 or $i==111 or $i==127 or $i==138 ){
						$stringXML .= "</Level>";
					}
				}
					$stringXML .= "</Levels>";

				$stringXML .= "</xml>";
				echo $stringXML;					
			}else{
				$stringXML = <<<XML
<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
<xml>
	<errorCode>1</errorCode>
</xml>
XML;
				echo $stringXML;
			}

			
		}else{
			$stringXML = "
					<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
					<xml>
						2
						<errorCode>1</errorCode>
					</xml>
					";
			echo $stringXML;
			
		}

	}else{
		$stringXML = <<<XML
<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
<xml>
	3
	<errorCode>1</errorCode>
</xml>
XML;
		echo $stringXML;
	}


?>


