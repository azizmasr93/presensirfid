<?php
function sukses_masuk($username,$pass){
	// Apabila username dan password ditemukan
	$login=mysql_query("SELECT * FROM user WHERE user='$username' AND pass='$pass' ");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);
	if ($ketemu > 0){
	  session_start();
	  include "timeout.php";
		$_SESSION['id']     = $r['id_user']; 
		$_SESSION['username']     = $r['user']; 
		$_SESSION['passuser']     = $r['pass'];
		$_SESSION['level']    = $r['level'];
		$_SESSION['nama']    = $r['nama'];

		
if ($r['level'] == "admin")
{  header('location:admin/?module=home');
}
else if ($r['level'] == "mhs")
{ header('location:mhs/?module=home'); 
}
else if ($r['level'] == "dosen")
{ header('location:dosen/?module=home'); 
}
		// session timeout
		$_SESSION['login'] = 1;
		timer();
		
	}
	return false;
}

function msg(){
  echo "<center><br><br><br><br><br><br>Maaf, silahkan cek kembali <b>Username</b> dan <b>Password</b> Anda<br><br>Kesalahan $_SESSION[salah]";
  echo "<br><br><div> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div>";
  echo "<br><input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";
  return false;
}


function salah_username($username){
  echo "<center><br><br><br><br><br><br>Maaf, Username <b>$username</b> tidak dikenal.";
  echo "<br><br><div> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div>";
  echo "<br><input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";	
  return false;
}

function salah_password(){
  echo "<center><br><br><br><br><br><br>Maaf, silahkan cek kembali <b>Password</b> Anda<br><br>Kesalahan";
  echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div><br><br>";
  echo "<input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";
   return false;
}

function blokir($username){
	mysql_query($sql);	 
	session_destroy();
	 return false;
}    

?>