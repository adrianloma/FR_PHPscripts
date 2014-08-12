<?php
session_start();
//determina si la cuenta es de maestros o de administrador
$HOST="localhost";
$USER="root";
$PSW="";
$DB="prueba";


if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
}


$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");
$query = mysqli_query($connect,"SELECT * FROM district WHERE email='$username'");

$num_rows = mysqli_num_rows($query);

if($num_rows == 1){
	// send to admin_login
	$_SESSION['CurrentUser'] = $username;
	$_SESSION['type'] = "admin";
	include 'login_admin.php';

}else if($num_rows == 0){
	// send to teacher_login
	$_SESSION['CurrentUser'] = $username;
	$_SESSION['type'] = "teacher";
	include 'login_teachers.php';
}



?>