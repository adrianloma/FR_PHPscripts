<?php
session_start();

$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";

//$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");

require('connect.php');

if(isset($_POST['email'])){
	$email=$_POST['email'];
}
if(isset($_POST['student_id'])){
	$student_id = $_POST['student_id'];
}
if(isset($_POST['newEmail'])){
	$newEmail = $_POST['newEmail'];
}


//check if student belongs to teacher

//Gets teacher's validation codes

$query = mysqli_query($connect,"SELECT * FROM validations WHERE teacher_email='$_SESSION[CurrentUser]'");
/* fetch associative array */
$i=0;
while ($row = mysqli_fetch_assoc($query)) {
    //fills array with teachers validation codes
	$array[$i] = $row['validation'];
	$i++;
}

//gets student validation code
$query = mysqli_query($connect,"SELECT * FROM students WHERE student_id = '$student_id' and email = '$email'");

$num_rows = mysqli_num_rows($query);

//checks if student exists in the table
if($num_rows == 1){
	//compares student;s validation code with teachers validation codes
	$row = mysqli_fetch_assoc($query);
	for($i=0; $i<count($array); $i++){
		//if student's id is the same that one of the teachers id
		if($row['validation'] == $array[$i] ){
			//modify student
			$query = mysqli_query($connect,
				"UPDATE students
				 SET email='$newEmail'
				 WHERE email='$email'; ");

			$_SESSION['message'] = "Student successfully modified.";
			header("Location: ../pages/main.php?page=ModifyStudent&modtype=2");
			exit;
		}
	}

}else{
	//display error "student not found"
	$_SESSION['message'] = "Student not found.";
	header("Location:  ../pages/main.php?page=ModifyStudent&modtype=2");
	exit;
}



?>