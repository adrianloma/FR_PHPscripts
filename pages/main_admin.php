<?php
	session_start();

	if($_SESSION['type'] != "admin"){
		die("Fatal Error");
	}

	if(isset($_SESSION['CurrentUser'])){
		echo "Welcome  ". $_SESSION['CurrentName'] . ".";

	}else{
		echo "You need to be logged in to view this page.";
		die();
	}

?>
<html>
	<header>
		<link rel="stylesheet" type="text/css" href="../Bootstrap/bootstrap.css">
	</header>
	<body>
		<ul class="nav nav-tabs nav-stacked col-md-2">
			<li><a href="?page=Home">Home</a></li>
			<li><a href="?page=AddTeacher">Add Teacher</a></li>
			<li><a href="?page=DeleteTeacher">Delete Teacher</a></li>
			<li><a href="?page=ModifyTeacher">Modify Teacher</a></li>
			<li><a href="?page=DistrictTeachers">District Teachers</a></li>
			<li><a href="?page=GenerateValidationCodes">Generate Validation Codes</a></li>
			<li><a href="../includes/logout.php">Log Out</a></li>

		</ul>
		<p id="info-message">
		<!--Displays errors and messages -->
		 <?php 
		 	if(isset($_SESSION['message']) ){
		 		echo $_SESSION['message'];	
		 		$_SESSION['message']="";	
		 	}
		 		
		 ?>
		</p>
		<!--Clear messages script, time = 3 secs -->
		<script>
			  setTimeout(function(){
			    document.getElementById('info-message').style.display = 'none';
			    
			  }, 3000);
		</script>

		<?php 

			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page= "";
			}

			include '../includes/case_admin.php';
		?>

	</body>

</html>

