<?php 
// menangkap data nama dengan method get
$lintang = $_GET['lintang'];
// menangkap data usia dengan method get
$bujur = $_GET['bujur'];
 
// menampilkan data nama
$file = fopen("C:\xampp\htdocs\gmt\event.gmt", "w");
$koor = $bujur." ".$lintang;
fwrite($file, $koor);
fclose($file);
// menampilkan data usia
echo '<img src="./lapneda.png" />';
?>