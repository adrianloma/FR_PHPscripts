<h3>Delete a student </h3>
<div class = "col-md-10" style= "left: 100px">
	<form action='../includes/delete_student.php' method='POST' onsubmit="return confirm('Are you sure you want to delete ');">
		First Name: <br><input type='text' name='fname'><br>
		Lastname <br><input type='text' name='lname'><br>
		Student id: <br><input type='text' name='student_id'><br>
		Email: <br><input type='text' name='email'><br>
		<br><input type='submit' value='Submit'>
	</form>
</div>