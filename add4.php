<?php
   	include("connect.php");
   	
	$link=Connection();
	$ID=$_POST["ID"];
	$kd_makul=$_POST["kd_makul"];
	$kelas = $_POST["kelas"];
	$hari = $_POST["hari"];
	$waktu = $_POST["waktu"];

	$hasil = -1;
	
	$result = mysql_query("SELECT tb_jadwal.hari, tb_jadwal.kelas, tb_makul.kd_makul, tb_dosen.id_rfiddosen 
	from tb_jadwal 
	join tb_makul on tb_jadwal.kd_makul = tb_makul.kd_makul 
	join tb_dosen on tb_dosen.id_dosen = tb_makul.id_dosen
	where tb_dosen.id_rfiddosen = '$ID' 
	and tb_makul.kd_makul = '$kd_makul' 
	and tb_jadwal.kelas = '$kelas' 
	and tb_jadwal.hari = '$hari'");
	
	if($row = mysql_fetch_array($result)){
		$hasil = 1;
		echo $hasil;
	} else {
		$hasil = 2;
		echo $hasil;
	}
	
   	mysql_query($link);
	mysql_close($link);
	
	$myfile = fopen("hasil.txt", "w") or die("Unable to open file!");
	$txt = $hasil;
	fwrite($myfile, $txt);
	fclose($myfile);
	
?>