<?php
require 'connect.php';

//loads module and level from as3
$email = $_POST['email'];
$level = $_POST['level'];

//creates xml string
$stringXML = "
<?xml version= \"1.0\" encoding= \"UTF-8\" standalone=\"yes\"?>
<xml>
	<currentLvlVector>
		<moduleNumber>1</moduleNumber>
		<lessonNumber>$level</lessonNumber>
		<Questions>
";

//gets current level vector questions from database
$query = mysqli_query($connect,
	"SELECT *
	 FROM questions_s$module_m$level
	 WHERE student_email = $email;
	");

//while results exists adds a new question tag with its question number correct and wrong questions.
while($row = mysqli_fetch_assoc($query)){
	switch($level){
		case 1:
			//llena las preguntas dependiendo de que nivel
			for($i=1;$i<24;$i++){
				$stringXML .=  "
					<Question>
						<questionNumber>$i</questionNumber>
						<correct>$row[q$i_right]</correct>
						<incorrect>$row[q$i_wrong]</incorrect>
					</Question>
				"
			}
			break;
		case 2:
			for($i=24;$i<48;$i++){
					$stringXML . =  "
						<Question>
							<questionNumber>$i</questionNumber>
							<correct>$row[q$i_right]</correct>
							<incorrect>$row[q$i_wrong]</incorrect>
						</Question>
					"
				}
			break;
		case 3:
			for($i=48;$i<69;$i++){
					$stringXML . =  "
						<Question>
							<questionNumber>$i</questionNumber>
							<correct>$row[q$i_right]</correct>
							<incorrect>$row[q$i_wrong]</incorrect>
						</Question>
					"
				}
			break;
		case 4:
			for($i=69;$i<91;$i++){
					$stringXML . =  "
						<Question>
							<questionNumber>$i</questionNumber>
							<correct>$row[q$i_right]</correct>
							<incorrect>$row[q$i_wrong]</incorrect>
						</Question>
					"
				}
			break;
		case 5:
			for($i=91;$i<112;$i++){
					$stringXML . =  "
						<Question>
							<questionNumber>$i</questionNumber>
							<correct>$row[q$i_right]</correct>
							<incorrect>$row[q$i_wrong]</incorrect>
						</Question>
					"
				}
			break;
		case 6:
			for($i=112;$i<128;$i++){
					$stringXML . =  "
						<Question>
							<questionNumber>$i</questionNumber>
							<correct>$row[q$i_right]</correct>
							<incorrect>$row[q$i_wrong]</incorrect>
						</Question>
					"
				}
			break;
		case 7:
			for($i=128;$i<139;$i++){
					$stringXML . =  "
						<Question>
							<questionNumber>$i</questionNumber>
							<correct>$row[q$i_right]</correct>
							<incorrect>$row[q$i_wrong]</incorrect>
						</Question>
					"
				}
			break;

	}
	
}
$stringXML . = "
</Questions>		
	</currentLvlVector>";

//previous level vector
$stringXML . = "
<prevLvlVector>
		<Questions>
";

//gets questions from all levels
$query = mysqli_query($connect,
	"SELECT *
	 FROM questions_s1_m1 q1, questions_s1_m2 q2, questions_s1_m3 q3, questions_s1_m4 q4, questions_s1_m5 q5, questions_s1_m6 q6, questions_s1_m7 q7
	 WHERE q1.student_email = $email and q1.student_email = q2.student_email and q1.student_email = q3.student_email 
	 	and q1.student_email = q4.student_email and q1.student_email = q5.student_email and q1.student_email = q6.student_email
	 	and q1.student_email = q7.student_email;
	");

//selects questions with difference of 5 or more
while($row = mysqli_fetch_assoc($query)){	
	for($i=1;$i<139;$i++){
		//starts question tag
		$stringXML . = "
		<Question>

		";

		//adds lesson number tag with corresponding lesson
		if($i > 1 and $i < 24){
			$stringXML . = "<lessonNumber>1</lessonNumber>";
		}else if( $i > 24 and $i < 48){
			$stringXML . = "<lessonNumber>2</lessonNumber>";
		}else if( $i > 48 and $i < 69){
			$stringXML . = "<lessonNumber>3</lessonNumber>";
		}else if( $i > 69 and $i < 91){
			$stringXML . = "<lessonNumber>4</lessonNumber>";
		}else if( $i > 91 and $i < 112){
			$stringXML . = "<lessonNumber>5</lessonNumber>";
		}else if( $i > 112 and $i < 128){
			$stringXML . = "<lessonNumber>6</lessonNumber>";
		}else if ( $i >128 and $ < 139){
			$stringXML . = "<lessonNumber>7</lessonNumber>";
		}

		//if correcto - wrong >= 5 then it is added to the string
		if( ($row['q$i_right'] - $row['q$i_wrong']) >= 5){
			$stringXML . =  "
					<questionNumber>$i</questionNumber>
					<correct>$row[q$i_right]</correct>
					<incorrect>$row[q$i_wrong]</incorrect>
				</Question>
			";
		}
			
	}
	
}
//ends string
$stringXML . = "
</Questions>
	</prevLvlVector>
</xml>

";

//echoes string

echo $stringXML;
?>