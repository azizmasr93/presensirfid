<?php
$koneksi=mysql_connect("localhost","root","")
// $koneksi=mysql_connect("mysql.idhostinger.com","u957067554_aziz","sevendream")
or
die("can't connect to database");
$db=mysql_select_db("presensi",$koneksi);
// $db=mysql_select_db("u957067554_rfid",$koneksi);
?>