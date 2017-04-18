<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$kd_makul = $_POST['kd_makul'];
$nm_makul = $_POST ['nm_makul'];
$id_dosen = $_POST ['id_dosen'];



// HAPUS
if($module=='mata_kuliah' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_makul WHERE kd_makul='".$_GET['kd_makul']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='mata_kuliah' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_makul set
						kd_makul = '$kd_makul',
						nm_makul = '$nm_makul',
						id_dosen = '$id_dosen'
						WHERE kd_makul = '$kd_makul';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='mata_kuliah' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_makul(kd_makul, nm_makul, id_dosen) VALUES ('$kd_makul','$nm_makul','$id_dosen');");
header('location:../../?module='.$module);
}
?>


