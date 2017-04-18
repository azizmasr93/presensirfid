<?php 
include("connect.php");
echo ("<br>");
echo ("<br>");
$result = mysql_query("SELECT * FROM `tb_jadwal`");
$row = mysql_fetch_array($result);

$waktudb = $row['waktu']; // waktu 21:00
$jamdb = substr($waktudb,0,2);
$menitdb = substr($waktudb,3,2);
echo "Waktu Dari Database : " ,$jamdb ,':' , $menitdb ; 
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo "batas waktu 30";
echo ("<br>");
echo ("<br>");
echo ("<br>");

$waktu = "19:18:1"; // dari arduino
$jamm = explode(':',$waktu);
$jam = $jamm[0];
$menit = $jamm[1];
echo "Waktu Dari Arduino : " ,$jam, ':',$menit;
echo ("<br>");

$jamSekarang = $jam * 60 + $menit; // jam * 60 + menit
$jamBuka = $jamdb * 60 + $menitdb;
$jamTutup = $jamBuka + 30 ;
echo ("<br>");
echo ("<br>");
echo ("$jamSekarang");echo ("<br>");
echo ("$jamBuka");echo ("<br>");
echo ("$jamTutup");echo ("<br>");
echo ("<br>");
echo ("<br>");
if ($jamBuka <= $jamSekarang && $jamTutup >= $jamSekarang)
{
	echo ("Masuk Bisa MaSuk"); 
}
else {
	echo ("tidak bisa masuk");
}
?>