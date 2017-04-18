<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_presensi = $_POST['id_presensi'];
$kd_makul = $_POST['kd_makul'];
$id_mhs = $_POST ['id_mhs'];
$tgl = $_POST['tgl'];
$waktu = $_POST['waktu'];


// HAPUS
if($module=='presensi' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_presensi WHERE id_presensi='".$_GET['id_presensi']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='presensi' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_presensi set
						kd_makul = '$kd_makul',
						id_mhs = '$id_mhs',
						tgl = '$tgl',
						waktu = '$waktu'
						WHERE id_presensi = '$id_presensi';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='presensi' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_presensi(id_presensi, kd_makul, id_mhs, tgl, waktu) VALUES ('$id_presensi', '$kd_makul', '$id_mhs', '$tgl','$waktu' );");
header('location:../../?module='.$module);
}
?>


