<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_dosen = $_POST['id_dosen'];
$id_rfiddosen = $_POST['id_rfiddosen'];
$nip = $_POST ['nip'];
$nm_dosen = $_POST['nm_dosen'];


// HAPUS
if($module=='dosen' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_dosen WHERE id_dosen='".$_GET['id_dosen']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='dosen' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_dosen set
						id_rfiddosen = '$id_rfiddosen',
						nip = '$nip',
						nm_dosen = '$nm_dosen'
						WHERE id_dosen = '$id_dosen';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='dosen' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_dosen(id_dosen,id_rfiddosen, nip, nm_dosen) VALUES ('$id_dosen','$id_rfiddosen', '$nip', '$nm_dosen');");
header('location:../../?module='.$module);
}
?>


