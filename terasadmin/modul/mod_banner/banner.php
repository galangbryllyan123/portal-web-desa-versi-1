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
  //cek hak akses user
  $cek=user_akses($_GET[module],$_SESSION[sessid]);
  if($cek==1 OR $_SESSION[leveluser]=='admin'){

  $aksi="modul/mod_banner/aksi_banner.php";
  switch($_GET[act]){
  
  
  default:

  // PESAN INPUT
  if(isset($_GET['msg']) && $_GET['msg']=='insert'){
  echo "<div class='alert alert-success'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menambahkan Banner.
  </div>";}
	
	
  // PESAN UPDATE
  elseif(isset($_GET['msg']) && $_GET['msg']=='update'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Banner.
  </div>";}
  
  // PESAN HAPUS
  elseif(isset($_GET['msg']) && $_GET['msg']=='delete'){
  echo "
  <div class='alert alert-error'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> menghapus Banner.
  </div>";}

  
  // PESAN AKTIF
  elseif(isset($_GET['msg']) && $_GET['msg']=='aktif'){
  echo " <div class='alert alert-info'>
  <button data-dismiss='alert' class='close' type='button'>x</button>
  <strong>Anda berhasil</strong> meng-update Banner.
  </div>";}
  
  
  echo "
  <div class='workplace'>
  <form action='$aksi?module=banner&act=hapussemua' method='post'>
   
  <div class='row-fluid'>
  <div class='span12'>                    
  <div class='head'>
  <div class='isw-grid'></div>
  <h1>BANNER</h1>     
  
  
  <ul class='buttons'>
  <li class='ttLC' title='Control Panel'>
  <a href='#' class='isw-settings'></a>
  <ul class='dd-list'>
  <li><a href='?module=banner&act=tambahbanner'><span class='isw-plus'></span> Tambahkan Banner</a></li>
  <li><input type='submit' value='Hapus yang terseleksi' class='btn btn-warning' style='width: 150px; height: 30px;'></li>
  </ul>
  </li>
  </ul>     
  
                            
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid table-sorting'>
  <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
	         
  <thead>
  <tr>
  <th><center><input type='checkbox' name='checkall' class='checkall' /></center></th>
  <th>Gambar</th>
  <th>URL</th>
  <th><center>Aktif</center></th>
  <th><center>Baca</center></th>
  <th><center>Hapus</center></th>
  </tr>
  </thead>";
		  
		  
  if ($_SESSION[leveluser]=='admin'){
  $tampil = mysqli_query($koneksi,"SELECT * FROM banner ORDER BY id_banner DESC");}
  
  else{
  $tampil=mysqli_query($koneksi,"SELECT * FROM banner
  WHERE username='$_SESSION[namauser]'       
  ORDER BY id_banner DESC");}
	
  $no=1;
  while ($r=mysqli_fetch_array($tampil)){
  $tgl=tgl_indo($r[tgl_posting]);
	  
	  
  echo "
  <tr> 
  <td width='5%'><center><input type='checkbox' name='cek[]' value='$r[id_banner]'></center></td>
  
  <td> 
  <a class='fancybox' rel='group' href='../img_banner/$r[gambar]'>
  <img src='../img_banner/$r[gambar]' width=100 class='tt' title='Perbesar Gambar'></a>
  </td>
  
  <td><a href=$r[url] target=_blank>$r[url]</a></td>
  <td width='8%'><center>$r[aktif]</center></td>
				
   
  <td width='8%'>
  <a href=?module=banner&act=editbanner&id=$r[id_banner]>
  <center><img src='img/edit.png' class='tt' title='Edit Banner'></center></a>
  </td>
   
  <td width='8%'>
  <a href=javascript:confirmdelete('$aksi?module=banner&act=hapus&id=$r[id_banner]&namafile=$r[gambar]') >
  <center><img src='img/hapus.png' class='tt' title='Hapus Banner'></center></a> 
  </td>
  
  </tr>"; 
  
  $no++;}
  
  echo "</table></form>
  <div class='clear'></div>
  </div>
  </div>                                
  </div>            
  <div class='dr'><span></span></div>";
  
  
  break;
  //TAMBAH Banner///////////////////////////////////////////////////////////////////////////////////
  case "tambahbanner":

  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Tambahkan Banner</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
		  
   
  <div class='row-form'>
  <div class='span3'>Judul Banner</div>
  <div class='span9'><input type=text name='judul'></div>
  <div class='clear'></div>
  </div>    
   
		  
  <div class='row-form'>
  <div class='span3'>URL</div>
  <div class='span9'><input type=text name='url' value='http://'></div>
  <div class='clear'></div>
  </div>    
		  
	
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>";  
		  		
  if ($r[aktif]=='Ya'){
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya' checked>Ya
  <input type=radio name='aktif' value='Tidak'>Tidak
  &nbsp;&nbsp;&nbsp;&nbsp;<span class style=\"color:#245689;font-size:12px;\">Pilih <b>'Ya'</b> 
  jika ingin diaktifkan di halaman web.</span></div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya'>Ya
  <input type=radio name='aktif' value='Tidak' checked>Tidak 
  &nbsp;&nbsp;&nbsp;&nbsp;<span class style=\"color:#245689;font-size:12px;\">Pilih <b>'Ya'</b> 
  jika ingin diaktifkan di halaman web.</span>
  </div>
  <div class='clear'></div>
  </div>";}
	
   
  echo "
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=banner'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";
  
  
		  
  break;
  //EDIT Banner/////////////////////////////////////////////////////////////////////////////////////////
  case "editbanner":
  $edit = mysqli_query($koneksi,"SELECT * FROM banner WHERE id_banner='$_GET[id]'");
  $r    = mysqli_fetch_array($edit);

  
  echo "
  <div class='workplace'>
  <div class='row-fluid'>
  
  <div class='span12'>
  <div class='head'>
  <div class='isw-documents'></div>
  <h1>Edit Banner</h1>
  <div class='clear'></div>
  </div>
					
  <div class='block-fluid'>             
  <form method=POST enctype='multipart/form-data' action=$aksi?module=banner&act=update>
  <input type=hidden name=id value=$r[id_banner]>
		     
   
  <div class='row-form'>
  <div class='span3'>Judul Banner</div>
  <div class='span9'><input type=text name='judul' value='$r[judul]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>URL</div>
  <div class='span9'><input type=text name='url' value='$r[url]'></div>
  <div class='clear'></div>
  </div>    
   
  <div class='row-form'>
  <div class='span3'>Gambar</div>
  <div class='span9'>
  <a class='fancybox' rel='group' href='../img_banner/$r[gambar]'>
  <img src='../img_banner/$r[gambar]' width=150 class='tt' title='Perbesar Gambar'></a>
  </div>
  <div class='clear'></div>
  </div>   
   
  <div class='row-form'>
  <div class='span3'>Ganti Gambar</div>
  <div class='span9'><input type=file name='fupload'></div>
  <div class='clear'></div>
  </div>";
   
    									 
    									 
  if ($r[aktif]=='Ya'){
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya' checked>Ya
  <input type=radio name='aktif' value='Tidak'>Tidak
  &nbsp;&nbsp;&nbsp;&nbsp;<span class style=\"color:#245689;font-size:12px;\">Pilih <b>'Ya'</b> 
  jika ingin diaktifkan di halaman web.</span></div>
  <div class='clear'></div>
  </div>";}
									  
  else{
  echo "
  <div class='row-form'>
  <div class='span3'>Aktifkan</div>
  <div class='span9'>
  <input type=radio name='aktif' value='Ya'>Ya
  <input type=radio name='aktif' value='Tidak' checked>Tidak 
  &nbsp;&nbsp;&nbsp;&nbsp;<span class style=\"color:#245689;font-size:12px;\">Pilih <b>'Ya'</b> 
  jika ingin diaktifkan di halaman web.</span>
  </div>
  <div class='clear'></div>
  </div>";}
		
   
  echo "
  <div class='row-form'>
  <a class='btn btn-danger btn-rounded' id=reset-validate-form href='?module=banner'>Batal</a>
  <input type='submit' name=TerasKreasi'  class='btn' value='Simpan' style='height:30px;'>
  </div>

  </form>
  </div></div></div>";

  break;}} 
  else {
  echo akses_salah();}}
  ?>

  <script>
  function confirmdelete(delUrl) {
  if (confirm("Anda yakin ingin menghapus?")) {
  document.location = delUrl;}}
  </script>
