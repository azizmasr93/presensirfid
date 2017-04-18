<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_mhs = $_POST['id_mhs'];
$id_rfidmhs = $_POST['id_rfidmhs'];
$nim = $_POST ['nim'];
$nm_mhs = $_POST['nm_mhs'];


// HAPUS
if($module=='mahasiswa' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_mhs WHERE id_mhs='".$_GET['id_mhs']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='mahasiswa' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_mhs set
						id_rfidmhs = '$id_rfidmhs',
						nim = '$nim',
						nm_mhs = '$nm_mhs'
						WHERE id_mhs = '$id_mhs';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='mahasiswa' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_mhs(id_mhs,id_rfidmhs, nim, nm_mhs) VALUES ('$id_mhs','$id_rfidmhs', '$nim', '$nm_mhs');");
header('location:../../?module='.$module);
}
?>


