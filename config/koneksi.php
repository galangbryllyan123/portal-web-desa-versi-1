<?php
// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

//KONVERSI PHP KE PHP 7
require_once "parser-php-version.php";

$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "wbtokoonlinev1"; //nama database
 
$koneksi = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
// buat variabel untuk validasi dari file fungsi_validasi.php

//$val = new Rizalvalidasi; ====INI ASLINYA+++
$val = new TerasKreasivalidasi;
?>