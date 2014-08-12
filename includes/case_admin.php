<?php
switch($page){
	case "Home":
		echo "This is the homepage";
		break;
	case "AddTeacher":
		include '../pages/page_addteacher.php';
		break;
	case "DeleteTeacher":
		include '../pages/page_deleteteacher.php';
		break;
	case "ModifyTeacher":
		include '../pages/page_modifyteacher.php';
		include 'modifyteacher.php';
		break;
	case "DistrictTeachers":
		include 'teacher_groups.php';
		break;
	case "GenerateValidationCodes":
		include 'show_students.php';
		break;
	default:
		echo "This is the homepage";


}


?>