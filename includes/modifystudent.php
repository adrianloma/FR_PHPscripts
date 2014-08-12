<?php
	if(isset($_GET['modtype'])){
		$modtype= $_GET['modtype'];

		switch($modtype){
			case 1:
				echo "<h3>Change Name</h3>";
				echo "<form action='../includes/change_name.php' method='POST'>
						Email: <br><input type='text' name='email'><br>
						Student ID: <br><input type='text' name='student_id'><br>
						New First Name: <br><input type='text' name='fname'><br>
						New Lastname: <br><input type='text' name='lname'><br>
						<br><input type='submit' value='Submit'>
					</form>";
				break;
			case 2:
				echo "<h3>Change Email</h3>";
				echo "<form action='../includes/change_email.php' method='POST'>
						Email: <br><input type='text' name='email'><br>
						Student ID: <br><input type='text' name='student_id'><br>
						New Email: <br><input type='text' name='newEmail'><br>
						<br><input type='submit' value='Submit'>
					</form>";
				break;
			case 3:
				echo "<h3>Change Student ID</h3>";
				echo "<form action='../includes/change_studentid.php' method='POST'>
						Email: <br><input type='text' name='email'><br>
						Student ID: <br><input type='text' name='student_id'><br>
						New Student ID: <br><input type='text' name='newStudent_id'><br>
						<br><input type='submit' value='Submit'>
					</form>";
				break;
			default:
				break;


		}
	}


?>