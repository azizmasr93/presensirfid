<?php
   	include("connect.php");
   	
	
	$ID="80323203";
	$id_kelas = "1";
	$hari = "Kamis";
	$waktu = "23:30:00";
	$kd_makul = "";

	$hasil = "-1";
	
	$result = mysql_query("SELECT tb_jadwal.hari, tb_jadwal.id_kelas, tb_makul.kd_makul, tb_dosen.id_rfiddosen 
	from tb_jadwal 
	join tb_makul on tb_jadwal.kd_makul = tb_makul.kd_makul 
	join tb_dosen on tb_dosen.id_dosen = tb_makul.id_dosen 
	where tb_dosen.id_rfiddosen = '$ID' 
	and tb_jadwal.id_kelas = '$id_kelas' 
	and tb_jadwal.hari = '$hari'");
	
	
	
	if($row = mysql_fetch_array($result)){
		$kd_makul = $row['kd_makul'];
		echo $kd_makul;
		$result1 = mysql_query("SELECT waktu from tb_jadwal where hari ='$hari' and kd_makul = '$kd_makul'");
		
		
		$row1 = mysql_fetch_array($result1); // waktu db
		$waktudb = $row1['waktu']; 
		echo $waktudb;
		
		$jamdb = substr($waktudb,0,2);
		$menitdb = substr($waktudb,3,2);
			
		$jamm = explode(':',$waktu); // waktu arduino
		$jam = $jamm[0];
		$menit = $jamm[1];
		
		$wkta = $jam * 60 + $menit;
		$wktdb = $jamdb * 60 + $menitdb;
		$hasilwkt =  $wkta - $wktdb;
		echo $hasilwkt;
		echo "<br>";
		

		
		if ($hasilwkt < 30 ){
			$hasil = "1";
			echo $hasil;
		}
		else {
			$hasil = "0";		
			echo $hasil;
				}		
		} 
	else  {
		$hasil = "0";
		echo $hasil;
	}
	$myfile = fopen("kd_makul.txt", "w") or die("Unable to open file!");
	$txt = "$kd_makul";
	fwrite($myfile, $txt);
	fclose($myfile);
   	
	//mysql_close($link);
	
	if ($id_kelas = "1"){
	$myfile = fopen("hasilA.txt", "w") or die("Unable to open file!");
	$txt = "$hasil";
	fwrite($myfile, $txt);
	fclose($myfile);
        }

        else if ($id_kelas = "2"){
	$myfile = fopen("hasilB.txt", "w") or die("Unable to open file!");
	$txt = "$hasil";
	fwrite($myfile, $txt);
	fclose($myfile);
        }
	
?>