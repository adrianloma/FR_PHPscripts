<?php

/*
//local
$connect = new mysqli("173.194.252.10",
			  'root', // username
			  'laracroft',     // password
			  'FreedomRun',
			  null

			  //'/cloudsql/gathr-app-618:gathrdb'
			  );
*/
//google
$connect = new mysqli(null,
			  'root', // username
			  '',     // password
			  'FreedomRun',
			  null,
			  '/cloudsql/freedomrun-001:freedomrun'
			  );




?>