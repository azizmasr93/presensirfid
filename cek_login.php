<?php
include "inc/inc.koneksi.php";
include "inc/fungsi_hdt.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$username= anti_injection($_POST['username']);
$pass	 = anti_injection($_POST[('password')]);
$pass	= md5($pass);
#$pass = anti_injection($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
//  echo "Maaf, Masukan Username dan Password";
?>
<script>
	alert('Maaf Login Tidak Bisa Injeksi, Masukan Username dan Password');
	window.location.href='index.php';
</script>
<?php
}else{
	$login	=mysql_query("SELECT * FROM user WHERE user='$username'");
	$ketemu	=mysql_num_rows($login);
	if ($ketemu>0){
		$r		=mysql_fetch_array($login);
		$pwd	=$r['pass'];
		if ($pwd==$pass){
			sukses_masuk($username,$pass);
		}else{
			session_start();
			salah_password();
		}
	}else{
		salah_username($username);
	}
}
?>
