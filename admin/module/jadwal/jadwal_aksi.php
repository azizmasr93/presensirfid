<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_jadwal = $_POST ['id_jadwal'];
$hari = $_POST ['hari'];
$waktu = $_POST ['waktu'];
$id_kelas = $_POST ['id_kelas'];
$kd_makul = $_POST['kd_makul'];



// HAPUS
if($module=='jadwal' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_jadwal WHERE id_jadwal='".$_GET['id_jadwal']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='jadwal' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_jadwal set
						hari = '$hari',
						waktu = '$waktu',
						id_kelas = '$id_kelas',
						kd_makul = '$kd_makul'
						WHERE id_jadwal = '$id_jadwal';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='jadwal' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_jadwal(id_jadwal, hari, waktu, id_kelas, kd_makul) VALUES ('$id_jadwal', '$hari', '$waktu', '$id_kelas', '$kd_makul');");
header('location:../../?module='.$module);
}
?>


