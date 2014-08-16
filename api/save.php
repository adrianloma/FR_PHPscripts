<?php 

$HOST="173.194.252.10";
$USER="andres";
$PSW="andres";
$DB="FreedomRun";

require('../includes/connect.php')

//connect to database
if($connect){
	//POST
	if(isset($_POST['xml'])){
		$stringXML = $_POST['xml'];
	}

	//STRING TO XML
	$xml = simplexml_load_string($stringXML);

	//xml variables
	$username = $xml->email;
	$language = $xml->language;
	$sound = $xml->sound;
	$avatar = $xml->avatar;
	$date = $xml->date;

	//language sound avatar
	$query = mysqli_connect($connect, 
		"UPDATE students
		 SET language = '$language',
		     sound = '$sound',
		     avatar = '$avatar'
		 WHERE student_email = '$username' 
		");

	//pantallas informativas insertar en base de datos

	for($i = 1; $i <= 12;$i++){
		$screen = "screen_".$i;
		$data = $xml->pantallasInformativas[$i]->p;
		$query = mysqli_connect($connect,
			"INSERT INTO info_screens($screen) VALUES($data) WHERE student_email = '$email';
			");
	}

	//save levels
	for($i = 1; $i < 139; $i++){
		$correct[$i] = $xml->Levels->Level[$i-1]->correct;
		$incorrect[$i] = $xml->Levels->Level[$i-1]->incorrect;

	}

	//table questions_s1_m1
	$query = mysqli_query($connect,
		"UPDATE questions_s1_m1 
		 SET q1_right = '$correct[1]',
			q1_wrong = '$incorrect[1]',
			q2_right = '$correct[2]',
			q2_wrong = '$incorrect[2]',
			q3_right = '$correct[3]',
			q3_wrong = '$incorrect[3]',
			q4_right = '$correct[4]',
			q4_wrong = '$incorrect[4]',
			q5_right = '$correct[5]',
			q5_wrong = '$incorrect[5]',
			q6_right = '$correct[6]',
			q6_wrong = '$incorrect[6]',
			q7_right = '$correct[7]',
			q7_wrong = '$incorrect[7]',
			q8_right = '$correct[8]',
			q8_wrong = '$incorrect[8]',
			q9_right = '$correct[9]',
			q9_wrong = '$incorrect[9]',
			q10_right = '$correct[10]',
			q10_wrong = '$incorrect[10]',
			q11_right = '$correct[11]',
			q11_wrong = '$incorrect[11]',
			q12_right = '$correct[12]',
			q12_wrong = '$incorrect[12]',
			q13_right = '$correct[13]',
			q13_wrong = '$incorrect[13]',
			q14_right = '$correct[14]',
			q14_wrong = '$incorrect[14]',
			q15_right = '$correct[15]',
			q15_wrong = '$incorrect[15]',
			q16_right = '$correct[16]',
			q16_wrong = '$incorrect[16]',
			q17_right = '$correct[17]',
			q17_wrong = '$incorrect[17]',
			q18_right = '$correct[18]',
			q18_wrong = '$incorrect[18]',
			q19_right = '$correct[19]',
			q19_wrong = '$incorrect[19]',
			q20_right = '$correct[20]',
			q20_wrong = '$incorrect[20]',
			q21_right = '$correct[21]',
			q21_wrong = '$incorrect[21]',
			q22_right = '$correct[22]',
			q22_wrong = '$incorrect[22]',
			q23_right = '$correct[23]',
			q23_wrong = '$incorrect[23]'
		WHERE student_email = '$username'
		");
		
	$query = mysqli_query($connect,
		"UPDATE questions_s1_m2 
		 SET q24_right ='$correct[24]',
			q24_wrong ='$incorrect[24]',
			q25_right ='$correct[25]',
			q25_wrong ='$incorrect[25]',
			q26_right ='$correct[26]',
			q26_wrong ='$incorrect[26]',
			q27_right ='$correct[27]',
			q27_wrong ='$incorrect[27]',
			q28_right ='$correct[28]',
			q28_wrong ='$incorrect[28]',
			q29_right ='$correct[29]',
			q29_wrong ='$incorrect[29]',
			q30_right ='$correct[30]',
			q30_wrong ='$incorrect[30]',
			q31_right ='$correct[31]',
			q31_wrong ='$incorrect[31]',
			q32_right ='$correct[32]',
			q32_wrong ='$incorrect[32]',
			q33_right ='$correct[33]',
			q33_wrong ='$incorrect[33]',
			q34_right ='$correct[34]',
			q34_wrong ='$incorrect[34]',
			q35_right ='$correct[35]',
			q35_wrong ='$incorrect[35]',
			q36_right ='$correct[36]',
			q36_wrong ='$incorrect[36]',
			q37_right ='$correct[37]',
			q37_wrong ='$incorrect[37]',
			q38_right ='$correct[38]',
			q38_wrong ='$incorrect[38]',
			q39_right ='$correct[39]',
			q39_wrong ='$incorrect[39]',
			q40_right ='$correct[40]',
			q40_wrong ='$incorrect[40]',
			q41_right ='$correct[41]',
			q41_wrong ='$incorrect[41]',
			q42_right ='$correct[42]',
			q42_wrong ='$incorrect[42]',
			q43_right ='$correct[43]',
			q43_wrong ='$incorrect[43]',
			q44_right ='$correct[44]',
			q44_wrong ='$incorrect[44]',
			q45_right ='$correct[45]',
			q45_wrong ='$incorrect[45]',	
			q46_right ='$correct[46]',
			q46_wrong ='$incorrect[46]',
			q47_right ='$correct[47]',
			q47_wrong ='$incorrect[47]'
			WHERE student_email = '$username'
		");


	$query = mysqli_connect($connect,
		"UPDATE questions_s1_m3
		 SET q48_right = '$incorrect[48]',
			q48_wrong = '$incorrect[48]',
			q49_right = '$incorrect[49]',
			q49_wrong = '$incorrect[49]',
			q50_right = '$incorrect[50]',
			q50_wrong = '$incorrect[50]',
			q51_right = '$incorrect[51]',
			q51_wrong = '$incorrect[51]',
			q52_right = '$incorrect[52]',
			q52_wrong = '$incorrect[52]',
			q53_right = '$incorrect[53]',
			q53_wrong = '$incorrect[53]',
			q54_right = '$incorrect[54]',
			q54_wrong = '$incorrect[54]',
			q55_right = '$incorrect[55]',
			q55_wrong = '$incorrect[55]',
			q56_right = '$incorrect[56]',
			q56_wrong = '$incorrect[56]',
			q57_right = '$incorrect[57]',
			q57_wrong = '$incorrect[57]',
			q58_right = '$incorrect[58]',
			q58_wrong = '$incorrect[58]',
			q59_right = '$incorrect[59]',
			q59_wrong = '$incorrect[59]',
			q60_right = '$incorrect[60]',
			q60_wrong = '$incorrect[60]',
			q61_right = '$incorrect[61]',
			q61_wrong = '$incorrect[61]',
			q62_right = '$incorrect[62]',
			q62_wrong = '$incorrect[62]',
			q63_right = '$incorrect[63]',
			q63_wrong = '$incorrect[63]',	
			q64_right = '$incorrect[64]',
			q64_wrong = '$incorrect[64]',
			q65_right = '$incorrect[65]',
			q65_wrong = '$incorrect[65]',
			q66_right = '$incorrect[66]',
			q66_wrong = '$incorrect[66]',
			q67_right = '$incorrect[67]',
			q67_wrong = '$incorrect[67]',
			q68_right = '$incorrect[68]',
			q68_wrong = '$incorrect[68]'
		WHERE student_email = '$username'

		");


	$query = mysqli_connect($connect,
		"UPDATE questions_s1_m4
		 SET q69_right = '$correct[69]',
			q69_wrong = '$incorrect[69]',
			q70_right = '$correct[70]',
			q70_wrong = '$incorrect[70]',
			q71_right = '$correct[71]',
			q71_wrong = '$incorrect[71]',
			q72_right = '$correct[72]',
			q72_wrong = '$incorrect[72]',
			q73_right = '$correct[73]',
			q73_wrong = '$incorrect[73]',
			q74_right = '$correct[74]',
			q74_wrong = '$incorrect[74]',
			q75_right = '$correct[75]',
			q75_wrong = '$incorrect[75]',
			q76_right = '$correct[76]',
			q76_wrong = '$incorrect[76]',
			q77_right = '$correct[77]',
			q77_wrong = '$incorrect[77]',
			q78_right = '$correct[78]',
			q78_wrong = '$incorrect[78]',
			q79_right = '$correct[79]',
			q79_wrong = '$incorrect[79]',
			q80_right = '$correct[80]',
			q80_wrong = '$incorrect[80]',
			q81_right = '$correct[81]',
			q81_wrong = '$incorrect[81]',
			q82_right = '$correct[82]',
			q82_wrong = '$incorrect[82]',
			q83_right = '$correct[83]',
			q83_wrong = '$incorrect[83]',
			q84_right = '$correct[84]',
			q84_wrong = '$incorrect[84]',
			q85_right = '$correct[85]',
			q85_wrong = '$incorrect[85]',
			q86_right = '$correct[86]',
			q86_wrong = '$incorrect[86]',
			q87_right = '$correct[87]',
			q87_wrong = '$incorrect[87]',
			q88_right = '$correct[88]',
			q88_wrong = '$incorrect[88]',
			q89_right = '$correct[89]',
			q89_wrong = '$incorrect[89]',
			q90_right = '$correct[90]',
			q90_wrong = '$incorrect[90]'
		WHERE student_email = '$username'

		");

	$query = mysqli_connect($connect,
		"UPDATE questions_s1_m5
		 SET q91_right = '$correct[91]',
			q91_wrong = '$incorrect[91]',
			q92_right = '$correct[92]',
			q92_wrong = '$incorrect[92]',
			q93_right = '$correct[93]',
			q93_wrong = '$incorrect[93]',
			q94_right = '$correct[94]',
			q94_wrong = '$incorrect[94]',
			q95_right = '$correct[95]',
			q95_wrong = '$incorrect[95]',
			q96_right = '$correct[96]',
			q96_wrong = '$incorrect[96]',
			q97_right = '$correct[97]',
			q97_wrong = '$incorrect[97]',
			q98_right = '$correct[98]',
			q98_wrong = '$incorrect[98]',
			q99_right = '$correct[99]',
			q99_wrong = '$incorrect[99]',
			q100_right = '$correct[100]',
			q100_wrong = '$incorrect[100]',
			q101_right = '$correct[101]',
			q101_wrong = '$incorrect[101]',
			q102_right = '$correct[102]',
			q102_wrong = '$incorrect[102]',
			q103_right = '$correct[103]',
			q103_wrong = '$incorrect[103]',
			q104_right = '$correct[104]',
			q104_wrong = '$incorrect[104]',
			q105_right = '$correct[105]',
			q105_wrong = '$incorrect[105]',
			q106_right = '$correct[106]',
			q106_wrong = '$incorrect[106]',
			q107_right = '$correct[107]',
			q107_wrong = '$incorrect[107]',
			q108_right = '$correct[108]',
			q108_wrong = '$incorrect[108]',
			q109_right = '$correct[109]',
			q109_wrong = '$incorrect[109]',
			q110_right = '$correct[110]',
			q110_wrong = '$incorrect[110]',
			q111_right = '$correct[111]',
			q111_wrong = '$incorrect[111]'
		WHERE student_email = '$username'

		");

	$query = mysqli_connect($connect,
		"UPDATE questions_s1_m6
		 SET q112_right ='$correct[112]',
			q112_wrong ='$incorrect[112]',
			q113_right ='$correct[113]',
			q113_wrong ='$incorrect[113]',
			q114_right ='$correct[114]',
			q114_wrong ='$incorrect[114]',
			q115_right ='$correct[115]',
			q115_wrong ='$incorrect[116]',
			q116_right ='$correct[116]',
			q116_wrong ='$incorrect[117]',
			q117_right ='$correct[117]',
			q117_wrong ='$incorrect[118]',
			q118_right ='$correct[118]',
			q118_wrong ='$incorrect[119]',
			q119_right ='$correct[120]',
			q119_wrong ='$incorrect[120]',
			q120_right ='$correct[121]',
			q120_wrong ='$incorrect[121]',
			q121_right ='$correct[122]',
			q121_wrong ='$incorrect[122]',
			q122_right ='$correct[123]',
			q122_wrong ='$incorrect[123]',
			q123_right ='$correct[124]',
			q123_wrong ='$incorrect[124]',
			q124_right ='$correct[125]',
			q124_wrong ='$incorrect[125]',
			q125_right ='$correct[126]',
			q125_wrong ='$incorrect[126]',
			q126_right ='$correct[127]',
			q126_wrong ='$incorrect[127]',
			q127_right ='$correct[128]',
			q127_wrong ='$incorrect[128]'
		WHERE student_email = '$username'

		");

	$query = mysqli_connect($connect,
		"UPDATE questions_s1_m7
		 SET q128_right = '$correct[128]',
			q128_wrong = '$incorrect[128]',
			q129_right = '$correct[129]',
			q129_wrong = '$incorrect[129]',
			q130_right = '$correct[130]',
			q130_wrong = '$incorrect[130]',
			q131_right = '$correct[131]',
			q131_wrong = '$incorrect[131]',
			q132_right = '$correct[132]',
			q132_wrong = '$incorrect[132]',
			q133_right = '$correct[133]',
			q133_wrong = '$incorrect[133]',
			q134_right = '$correct[134]',
			q134_wrong = '$incorrect[134]',
			q135_right = '$correct[135]',
			q135_wrong = '$incorrect[135]',
			q136_right = '$correct[136]',
			q136_wrong = '$incorrect[136]',
			q137_right = '$correct[137]',
			q137_wrong = '$incorrect[137]',
			q138_right = '$correct[138]',
			q138_wrong = '$incorrect[138]'
		WHERE student_email = '$username'

		");

	//updates table
	$query = mysqli_query($connect,
		"UPDATE updates
		 SET last_update = '$date'
		 WHERE student_email = '$username'
		");

	//connection succes
	echo "true"

}else{
	//connection success
	echo "false;"
}



?>