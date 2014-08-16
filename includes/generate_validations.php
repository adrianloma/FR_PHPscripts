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

//post values
$teacher_email = $_POST['teacher_email'];
$max_students = $_POST['max_students'];

//obtain teacher values

$query= mysqli_query($connect,
	"SELECT * 
	 FROM teachers
	 WHERE email = '$teacher_email'");

$row = mysqli_fetch_assoc($query);

//obtain district values

$query_district = mysqli_query($connect,
	"SELECT *
	 FROM district
	 WHERE email = '$_SESSION[CurrentUser]'");

$row_district = mysqli_fetch_assoc($query_district);

//obtain  max value from groups
$query_validation = mysqli_query($connect,
	"SELECT MAX(group_id) as max
	 FROM validations
	 WHERE teacher_email = '$teacher_email'");

$row_max = mysqli_fetch_assoc($query_validation);

//if teacher has no groups assign group_id to 1 else group++
$group = $row_max['max'];
if($group == NULL){
	$group = 1;
}else{
	$group++;
}


//prepare strings
if($row_district['district_id'] < 10){
	$district_id = "0".$row_district['district_id'];
}else{
	$district_id = "".$row_district['district_id'];
}

if($row['teacher_id'] < 10){
	$teacher_id = "0".$row['teacher_id'];
}else{
	$teacher_id = "".$row['teacher_id'];
}

//generate validation code
//primera letra de distrito + id distrito + primera letra de nombre del profesor + primera letra de apellido del profe + id profesor + id grupo
$validation=""; 
$validation = substr($_SESSION['CurrentName'],0,1).$district_id .substr($row['fname'],0,1).substr($row['lname'], 0,1).$teacher_id.$group;

//insert validation into validations table

$query= mysqli_query($connect,
	"INSERT INTO validations(teacher_email,validation,max_students) VALUES('$teacher_email','$validation','$max_students')");

$_SESSION['message'] = "Validation " .$validation." added to ".$teacher_email.".";
header("Location: ../pages/main_admin.php?page=GenerateValidationCodes");
exit;


?>