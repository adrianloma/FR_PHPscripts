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
if(isset($_POST['teacher_id'])){
	$teacher_id = $_POST['teacher_id'];
}
if(isset($_POST['newteacher_id'])){
	$newteacher_id = $_POST['newteacher_id'];
}


//checks if id is taken
$query = mysqli_query($connect,"SELECT * FROM teachers WHERE teacher_id='$newteacher_id'");
$numrows = mysqli_num_rows($query);
//if a result is thrown
if($numrows == 1){
	$_SESSION['message'] = "Teacher ID is taken.";
	header("Location:  ../pages/main_admin.php?page=ModifyTeacher&modtype=3");
	exit;
}


//gets student validation code
$query = mysqli_query($connect,"SELECT * FROM teachers WHERE teacher_id = '$teacher_id' and email = '$email'");

$num_rows = mysqli_num_rows($query);

//checks if teacher exists in the table
if($num_rows == 1){

	//modify teacher
	$query = mysqli_query($connect,
		"UPDATE teachers
		 SET teacher_id='$newteacher_id'
		 WHERE email='$email'; ");

	$_SESSION['message'] = "Teacher successfully modified.";
	header("Location:  ../pages/main_admin.php?page=ModifyTeacher&modtype=3");
	exit;
		
	

}else{
	//display error "student not found"
	$_SESSION['message'] = "Teacher not found.";
	header("Location: ../pages/main_admin.php?page=ModifyTeacher&modtype=3");
	exit;
}



?>