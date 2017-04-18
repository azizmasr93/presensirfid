<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_kelas = $_POST['id_kelas'];
$nm_kelas = $_POST ['nm_kelas'];


// HAPUS
if($module=='kelas' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_kelas WHERE id_kelas='".$_GET['id_kelas']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='kelas' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_kelas set
						nm_kelas = '$nm_kelas'
						WHERE id_kelas = '$id_kelas';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='kelas' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_kelas(id_kelas, nm_kelas) VALUES ('$id_kelas','$nm_kelas');");
header('location:../../?module='.$module);
}
?>


