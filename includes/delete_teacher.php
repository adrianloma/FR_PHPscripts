<?php
session_start();

//Database connection params
$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";

//database connection
//$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");

require('connect.php');


//variable definition
if(isset($_POST['fname'])){
	$fname=$_POST['fname'];
}
if(isset($_POST['lname'])){
	$lname=$_POST['lname'];
}
if(isset($_POST['teacher_id'])){
	$teacher_id=$_POST['teacher_id'];
}
if(isset($_POST['email'])){
	$email=$_POST['email'];
}



//gets teacher
$query = mysqli_query($connect,"SELECT * FROM teachers WHERE fname='$fname' and lname='$lname' and teacher_id = '$teacher_id' and email = '$email'");

$num_rows = mysqli_num_rows($query);

//checks if teacher exists in the table
if($num_rows == 1){
	
	$row = mysqli_fetch_assoc($query);
	//delete teacher from database
	$query = mysqli_query($connect,"DELETE FROM teachers WHERE email='$email'");
	$_SESSION['message'] = "Teacher successfully removed.";
	header("Location:  ../pages/main_admin.php?page=DeleteTeacher");
	exit;


}else{
	//display error "teacher not found"
	$_SESSION['message'] = "Teacher not found.";
	header("Location:  ../pages/main_admin.php?page=DeleteTeacher");
	exit;
}



?>