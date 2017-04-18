<?php
include "../../koneksi.php"
?>

<?php
$module=$_GET['module'];
$aksi=$_GET['aksi'];


$id_mhsmakul = $_POST ['id_mhsmakul'];
$kd_makul = $_POST['kd_makul'];
$id_mhs = $_POST ['id_mhs'];


// HAPUS
if($module=='mhs_makul' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM tb_mhsmakul WHERE id_mhsmakul='".$_GET['id_mhsmakul']."'");
header('location:../../?module='.$module);
}


// EDIT
else if($module=='mhs_makul' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE tb_mhsmakul set
						kd_makul = '$kd_makul',
						id_mhs = '$id_mhs'
						WHERE id_mhsmakul = '$id_mhsmakul';");			  
header('location:../../?module='.$module);
}
// TAMBAH
else if($module=='mhs_makul' AND $aksi=='tambah'){
$query = mysql_query("INSERT INTO tb_mhsmakul(id_mhsmakul, kd_makul, id_mhs) VALUES ('$id_mhsmakul','$kd_makul','$id_mhs');");
header('location:../../?module='.$module);
}
?>


