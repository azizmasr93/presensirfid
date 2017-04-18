<?php
	include("inc/inc.koneksi.php");

	$hasil = -1;
	$id = $_GET['id'];
	

	$id_md5 = md5($id);
	

	$hasil = "$id";

	$result = mysql_query("SELECT id_dosen FROM tb_dosen where rfid='$id_md5' and password='$pass_md5'");
	if($row = mysql_fetch_array($result)){
		$hasil = 1;
		echo $hasil;
		$insert_histori = mysql_query("INSERT INTO `rfid`.`histori` (`No`, `rfid`, `Tanggal`) VALUES (NULL, '$id', CURRENT_TIMESTAMP)");
	} else {
		$hasil = 0;
		echo $hasil;
	}

	$myfile = fopen("hasil_login.txt", "w") or die("Unable to open file!");
	$txt = $hasil;
	fwrite($myfile, $txt);
	fclose($myfile);
?>