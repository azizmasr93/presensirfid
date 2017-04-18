<?php
	$myfile = fopen("kd_makul.txt", "r") or die("Unable to open file!");
	$makul = fread($myfile,filesize("kd_makul.txt"));
	echo $makul;
	fclose($myfile);
	?>