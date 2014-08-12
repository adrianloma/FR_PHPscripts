<?php

//Database connection params
$HOST="localhost";
$USER="root";
$PSW="";
$DB="prueba";


//database connection
$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");

$query = mysqli_query($connect,
	"SELECT s.email, s.student_id, s.fname,s.lname, v.group_id 
	 FROM students s,teachers t,validations v 
	 WHERE t.email = '$_SESSION[CurrentUser]' and t.email = v.teacher_email and s.validation = v.validation");

echo "<table class=\"table table-striped col-md-10\" > ";
echo "<tr><td> Email </td> <td> Student ID </td> <td> First Name </td> <td> Lastname </td> <td> Group </td> </tr>" ;
while ($row = mysqli_fetch_assoc($query)) {
    //displays values in a table
	echo "<tr>";
	echo "<td>" . $row['email'] . "</td> <td>". $row['student_id'] . "</td> <td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td><td>" . $row['group_id']. "</td> </tr>" ;
}
echo "</table>";





?>