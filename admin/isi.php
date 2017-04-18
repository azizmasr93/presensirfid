<?php
if ($_GET['module'] == "home") {
	include "module/home.php";	
}
else if ($_GET['module'] == "presensi") {
	include "module/presensi/presensi.php";
}
else if ($_GET['module'] == "mata_kuliah") {
	include "module/mata_kuliah/mata_kuliah.php";
}
else if ($_GET['module'] == "jadwal") {
	include "module/jadwal/jadwal.php";
}
else if ($_GET['module'] == "mhs_makul") {
	include "module/mhs_makul/mhs_makul.php";
}
else if ($_GET['module'] == "dosen") {
	include "module/dosen/dosen.php";	
}
else if ($_GET['module'] == "mahasiswa") {
	include "module/mahasiswa/mahasiswa.php";
}
else if ($_GET['module'] == "kelas") {
	include "module/kelas/kelas.php";
}
?>