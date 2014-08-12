<?php
switch($page){
	case "Home":
		echo "This is the homepage";
		break;
	case "AddStudent":
		include '../pages/page_addstudent.php';
		break;
	case "DeleteStudent":
		include '../pages/page_deletestudent.php';
		break;
	case "ModifyStudent":
		include '../pages/page_modifystudent.php';
		include 'modifystudent.php';
		break;
	case "MyGroups":
		include 'teacher_groups.php';
		break;
	case "MyStudents":
		include 'show_students.php';
		break;
	default:
		echo "This is the homepage";


}


?>