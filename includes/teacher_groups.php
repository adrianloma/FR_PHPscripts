<?php

//Database connection params
$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";



//database connection
//$connect = mysqli_connect($HOST,$USER,$PSW,$DB) or die("Fatal error: couldn't connecto to the database");


require('connect.php');

$query = mysqli_query($connect,"SELECT group_id, validation, max_students FROM validations WHERE teacher_email='$_SESSION[CurrentUser]' group by group_id");

echo "<table class=\"table table-striped col-md-10\" > ";
echo "<tr><td> Group </td> <td> Validation Code </td> <td> Max Students </td> </tr>" ;
while ($row = mysqli_fetch_assoc($query)) {
    //displays values in a table
	echo "<tr>";
	echo "<td>" . $row['group_id'] . "</td> <td>". $row['validation'] . "</td> <td>" . $row['max_students'] . "</td> </tr>" ;
}
echo "</table>";





?>