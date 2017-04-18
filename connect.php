<?php

	function Connection(){
		$server="localhost";	 // for example: my_sql.database.com
		$user="root";
		$pass="";
		$db="presensi";			// for example: my_dbase
		
		//$server="mysql.idhostinger.com";	 // for example: my_sql.database.com
		//$user="u957067554_aziz";
		//$pass="sevendream";
		//$db="u957067554_rfid";	
		

		// The above information you should get from your hosting company
	   	
		$connection = mysql_connect($server, $user, $pass);
	

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>

