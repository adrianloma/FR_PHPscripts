<?php

//Database connection params
$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";


//database connection
$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");

$query = mysqli_query($connect,
	"SELECT t.email, t.teacher_id, t.fname,t.lname
	 FROM district d,teachers t 
	 WHERE d.email = '$_SESSION[CurrentUser]' and t.district_email = d.email
	 ORDER BY t.teacher_id");

echo "<table class=\"table table-striped col-md-10\" > ";
echo "<tr><td> Email </td> <td> Teacher ID </td> <td> First Name </td> <td> Lastname </td> </tr>" ;
while ($row = mysqli_fetch_assoc($query)) {
    //displays values in a table
	echo "<tr>";
	echo "<td>" . $row['email'] . "</td> <td>". $row['teacher_id'] . "</td> <td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td></tr>"  ;
}
echo "</table>";





?>