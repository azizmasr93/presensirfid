<?php
   	include("connect.php");
   	
	//$link=Connection();
	$ID=$_POST["ID"];
	$kd_makul=$_POST["kd_makul"];
	
	$hasil = -1;
	
	$result = mysql_query("SELECT tb_dosen.id_rfiddosen, tb_makul.kd_makul FROM tb_dosen join tb_makul on tb_dosen.id_dosen = tb_makul.id_dosen where kd_makul = '$kd_makul' and id_rfiddosen = '$ID'");
	
	if($row = mysql_fetch_array($result)){
		$hasil = 1;
		echo $hasil;
	} else {
		$hasil = 0;
		echo $hasil;
	}

   	//mysql_query($link);
	//mysql_close($link);
	
	$myfile = fopen("hasil.txt", "w") or die("Unable to open file!");
	$txt = $hasil;
	fwrite($myfile, $txt);
	fclose($myfile);
	
?>


<?php
   	include("connect.php");
   	
	//$link=Connection();
	$ID=$_POST["ID"];
	$makul=$_POST["makul"];
	$hasil1 = -1;
	
	$result = mysql_query("Select tb_mhsmakul.kd_makul,tb_mhs.id_rfidmhs from tb_mhsmakul join tb_mhs on tb_mhs.id_mhs = tb_mhsmakul.id_mhs where kd_makul = '$makul' and id_rfidmhs = '$ID'");
	
	if($row = mysql_fetch_array($result)){
		$hasil1 = 1;
		echo $hasil1;
		
	} else {
		$hasil1 = 0;
		echo $hasil1;
	}

   	//mysql_query($link);
	//mysql_close($link);
	//
	$myfile = fopen("hasil1.txt", "w") or die("Unable to open file!");
	$txt = $hasil1;
	fwrite($myfile, $txt);
	fclose($myfile);

   //	header("Location: index.php");	
?>





<?php
   	include("connect.php");
   	
	//$link=Connection();
	$ID=$_POST["ID"];
	$kd_makul=$_POST["kd_makul"];
	$waktu=$_POST["waktu"];
	$hari=$_POST["hari"];
	
	$hasil = -1;	
	
	$result = mysql_query("SELECT tb_dosen.id_rfiddosen, tb_makul.kd_makul FROM tb_dosen join tb_makul on tb_dosen.id_dosen = tb_makul.id_dosen where kd_makul = '$kd_makul' and id_rfiddosen = '$ID'");
	$result1 = mysql_query("SELECT tb_jadwal.hari, tb_makul.kd_makul FROM tb_jadwal join tb_makul on tb_jadwal.kd_makul = tb_makul.kd_makul where tb_jadwal.kd_makul ='$kd_makul' and hari ='$hari'");
	
	if($row = mysql_fetch_array($result)){
		if ($row = mysql_fetch_array($result1)){
			$hasil = 1;
			echo $hasil;
		}
		else {
			$hasil = 0;
			echo $hasil;
	} else {
		$hasil = 0;
		echo $hasil;
	}

   	//mysql_query($link);
	//mysql_close($link);
	
	$myfile = fopen("hasil.txt", "w") or die("Unable to open file!");
	$txt = $hasil;
	fwrite($myfile, $txt);
	fclose($myfile);
	
?>


<?php
				$waktu1 = "07:10:18"; 
			  $jam = substr($waktu1,0,2);
			  $menit = substr($waktu1,3,2);
			  $detik = substr($waktu1,6,2);
				$waktu2 = ($jam * 60 + $menit);
				echo ($waktu2);
			 ?>