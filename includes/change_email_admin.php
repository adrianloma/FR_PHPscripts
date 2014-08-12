

<?php
session_start();

$HOST="localhost";
$USER="root";
$PSW="";
$DB="prueba";

$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");

if(isset($_POST['email'])){
	$email=$_POST['email'];
}
if(isset($_POST['teacher_id'])){
	$teacher_id = $_POST['teacher_id'];
}
if(isset($_POST['newEmail'])){
	$newEmail = $_POST['newEmail'];
}



//gets teachers validation code
$query = mysqli_query($connect,"SELECT * FROM teachers WHERE teacher_id = '$teacher_id' and email = '$email'");

$num_rows = mysqli_num_rows($query);

//checks if student exists in the table
if($num_rows == 1){
	//compares student;s validation code with teachers validation codes
	$row = mysqli_fetch_assoc($query);
	//modify student
	$query = mysqli_query($connect,
		"UPDATE teachers
		 SET email='$newEmail'
		 WHERE email='$email'; ");

	$_SESSION['message'] = "Teacher successfully modified.";
	header("Location: ../pages/main_admin.php?page=ModifyTeacher&modtype=2");
	exit;
		
	

}else{
	//display error "student not found"
	$_SESSION['message'] = "Teacher not found.";
	header("Location:  ../pages/main_admin.php?page=ModifyTeacher&modtype=2");
	exit;
}



?>