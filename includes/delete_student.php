<?php
session_start();

//Database connection params
$HOST="localhost";
$USER="root";
$PSW="";
$DB="prueba";


//database connection
$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");

//variable definition
if(isset($_POST['fname'])){
	$fname=$_POST['fname'];
}
if(isset($_POST['lname'])){
	$lname=$_POST['lname'];
}
if(isset($_POST['student_id'])){
	$student_id=$_POST['student_id'];
}
if(isset($_POST['email'])){
	$email=$_POST['email'];
}

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
$query = mysqli_query($connect,"SELECT * FROM students WHERE fname='$fname' and lname='$lname' and student_id = '$student_id' and email = '$email'");

$num_rows = mysqli_num_rows($query);

//checks if student exists in the table
if($num_rows == 1){
	//compares student;s validation code with teachers validation codes
	$row = mysqli_fetch_assoc($query);
	for($i=0; $i<count($array); $i++){
		//if student's id is the same that one of the teachers id
		if($row['validation'] == $array[$i] ){
			//delete student from database
			$query = mysqli_query($connect,"DELETE FROM students WHERE email='$email'");
			$_SESSION['message'] = "Student successfully removed.";
			header("Location:  ../pages/main.php?page=DeleteStudent");
			exit;
		}
	}

}else{
	//display error "student not found"
	$_SESSION['message'] = "Student not found.";
	header("Location:  ../pages/main.php?page=DeleteStudent");
	exit;
}



?>