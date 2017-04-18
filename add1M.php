<?php
   	include("connect.php");
   	
	$link=Connection();
	mysql_query($link);
	$ID=$_POST["ID"];
	$waktu = $_POST["waktu"];
	$id_kelas=$_POST["id_kelas"];
	
	$myfile = fopen("kd_makul1.txt", "r") or die("Unable to open file!");
	$makul = fread($myfile,filesize("kd_makul1.txt"));
	fclose($myfile);
	echo $makul;
	
	$hasil = "-1";
	
	$result = mysql_query("Select tb_mhsmakul.kd_makul, tb_mhs.id_rfidmhs, tb_mhs.id_mhs 
	from tb_mhsmakul 
	join tb_mhs on tb_mhs.id_mhs = tb_mhsmakul.id_mhs 
	where kd_makul = '$makul' 
	and id_rfidmhs = '$ID'");
	
	if($row = mysql_fetch_array($result))	{
		$result1 = mysql_query("SELECT waktu from tb_jadwal where id_kelas = '$id_kelas' and kd_makul ='$makul'");
		$row1 = mysql_fetch_array($result1); // waktu db
		
		$waktudb = $row1['waktu'];
		echo ($waktudb);	
		echo "<br>";
	
		$jamdb = substr($waktudb,0,2);
		$menitdb = substr($waktudb,3,2);
			
		$jamm = explode(':',$waktu); // waktu arduino
		$jam = $jamm[0];
		$menit = $jamm[1];
		
		$wkta = $jam * 60 + $menit;
		$wktdb = $jamdb * 60 + $menitdb;
		$hasilwkt =  $wkta - $wktdb; // perhitungan ijin masuk
		
		
		if ($hasilwkt < 30 ){
			$hasil = "1";
			echo $hasil;
			echo "<br>";
			$value=$row['id_mhs'];
			echo $value;
			$insert = mysql_query("INSERT INTO `presensi`.`tb_presensi` (`id_presensi`, `kd_makul`, `id_mhs`, `tgl`, `waktu`) VALUES (NULL, '$makul', '$value', CURRENT_DATE(), CURRENT_TIME())");
		}
		else {
			$hasil = "0";		
			echo $hasil;
			}		
			
	}		
	else 
	{
		$hasil = "0";
		echo $hasil;
	}

   	
	//mysql_close($link);
	
	
	$myfile = fopen("hasil1M.txt", "w") or die("Unable to open file!");
	$txt = "$hasil";
	fwrite($myfile, $txt);
	fclose($myfile);
        
?>
