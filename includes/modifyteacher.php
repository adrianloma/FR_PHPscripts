<?php
	if(isset($_GET['modtype'])){
		$modtype= $_GET['modtype'];

		switch($modtype){
			case 1:
				echo "<h3>Change Name</h3>";
				echo "<form action='../includes/change_name_admin.php' method='POST'>
						Email: <br><input type='text' name='email'><br>
						Teacher ID: <br><input type='text' name='teacher_id'><br>
						New First Name: <br><input type='text' name='fname'><br>
						New Lastname: <br><input type='text' name='lname'><br>
						<br><input type='submit' value='Submit'>
					</form>";
				break;
			case 2:
				echo "<h3>Change Email</h3>";
				echo "<form action='../includes/change_email_admin.php' method='POST'>
						Email: <br><input type='text' name='email'><br>
						Teacher ID: <br><input type='text' name='teacher_id'><br>
						New Email: <br><input type='text' name='newEmail'><br>
						<br><input type='submit' value='Submit'>
					</form>";
				break;
			case 3:
				echo "<h3>Change Teacher ID</h3>";
				echo "<form action='../includes/change_teacherid.php' method='POST'>
						Email: <br><input type='text' name='email'><br>
						Teacher ID: <br><input type='text' name='teacher_id'><br>
						New Teacher ID: <br><input type='text' name='newTeacher_id'><br>
						<br><input type='submit' value='Submit'>
					</form>";
				break;
			default:
				break;


		}
	}


?>