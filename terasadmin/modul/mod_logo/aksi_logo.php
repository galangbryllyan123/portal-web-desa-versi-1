<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 
  echo "
  <link href='../../css/stylesheet.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../favicon.png' />";

  echo "
  <body class='special-page'>
  <div id='container'>
  
  <section id='error-number'>
  <center><div class='gembok'><img src='../../img/lock.png'></div></center>
  <h1>AKSES ILEGAL</h1>
  <p class='maaf'>Untuk mengakses modul, Anda harus login dahulu!</p><br/>
  </section>
  
  <section id='error-text'>
  <p><a class='tombol' href=../../index.php><b>LOGIN DISINI</b></a></p>
  </section>
  </div>";}




else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus logo
if ($module=='logo' AND $act=='hapus'){
  mysqli_query($koneksi,"DELETE FROM logo WHERE id_logo='$_GET[id]'");
  header('location:../../media.php?module='.$module.'&msg=delete');
}

// Input logo
elseif ($module=='logo' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadlogo($nama_file);
    mysqli_query($koneksi,"INSERT INTO logo(judul,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysqli_query($koneksi,"INSERT INTO logo(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module.'&msg=insert');
}

// Update logo
elseif ($module=='logo' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE logo SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_logo = '$_POST[id]'");
  }
  else{
    Uploadlogo($nama_file);
	$data_gambar= mysqli_query($koneksi,"SELECT gambar FROM logo WHERE id_logo='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../img_logo/'.$r['gambar']);
    Uploadlogo($nama_file,'../../../img_logo/',300,120);

	
    mysqli_query($koneksi,"UPDATE logo SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_logo = '$_POST[id]'");
  }
   header('location:../../media.php?module='.$module.'&msg=update');
}}
?>
