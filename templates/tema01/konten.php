  
  <script language="javascript">
 
 
  return (true);}

  function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
  return false;
  return true;}

  $(document).ready(function() {
  $('#jasa').change(function() { 
  var category = $(this).val();
  $.ajax({
  type: 'GET',
  url: 'config/kota.php',
  data: 'perusahaan=' + category, // Untuk data di MySQL dengan menggunakan kata kunci tsb
  dataType: 'html',
  beforeSend: function() {
  $('#kota').html('<tr><td colspan=2>Loading ....</td></tr>');	
  },
  success: function(response) {
  $('#kota').html(response);
  }
  });
  });
  });

  </script>



  <?php
  
  // HALAMAN HOME ////////////////////////////////////////////
  if ($_GET['module']=='home'){
  include "modul/beranda.php";}
  ////////////////////////////////////////////////////////////

  // DETAIL BLOG ////////////////////////////////////////////
  elseif ($_GET['module']=='detailblog'){
  include "$f[folder]/modul/blog/detailblog.php";}
  ////////////////////////////////////////////////////////////

  // KATEGORI BLOG////////////////////////////////////////////
  elseif ($_GET['module']=='detailkategoriblog'){
  include "$f[folder]/modul/blog/detailkategoriblog.php";}
  ////////////////////////////////////////////////////////////

  // SEMUA BLOG////////////////////////////////////////////
  elseif ($_GET['module']=='semuablog'){
  include "$f[folder]/modul/blog/semuablog.php";}
  ////////////////////////////////////////////////////////////

  // HUBUNGI KAMI////////////////////////////////////////////
  elseif ($_GET['module']=='hubungikami'){
  include "$f[folder]/modul/kontak/hubungi.php";}
  /////////////////////////////////////////////////////////////

  // HUBUNGI AKSI ////////////////////////////////////////////
  elseif ($_GET['module']=='hubungiaksi'){
  include "$f[folder]/modul/kontak/hubungiaksi.php";}
  /////////////////////////////////////////////////////////////

  // DETAIL PRODUK////////////////////////////////////////////
  elseif ($_GET['module']=='detailproduk'){
  include "$f[folder]/modul/produk/detailproduk.php";}
  /////////////////////////////////////////////////////////////

  // SEMUA PRODUK////////////////////////////////////////////
  elseif ($_GET['module']=='semuaproduk'){
  include "$f[folder]/modul/produk/semuaproduk.php";}
  /////////////////////////////////////////////////////////////


  // DISKON ////////////////////////////////////////////
  elseif ($_GET['module']=='diskon'){
    include "$f[folder]/modul/produk/diskon.php";}
  /////////////////////////////////////////////////////////////
  
  
  // PRODUK PERKATEGORI///////////////////////////////////////
  elseif ($_GET['module']=='detailkategori'){
  include "$f[folder]/modul/produk/detailkategori.php";}
  /////////////////////////////////////////////////////////////

  // CARI PRODUK ////////////////////////////////////////////
  elseif ($_GET['module']=='hasilcari'){
  include "$f[folder]/modul/produk/hasilcari.php";}
  ////////////////////////////////////////////////////////////

  // KERANJANG BELANJA ///////////////////////////////////////
  elseif ($_GET['module']=='keranjangbelanja'){
  include "$f[folder]/modul/produk/keranjangbelanja.php";}
  ////////////////////////////////////////////////////////////
  
  // SELESAI BELANJA ////////////////////////////////////////////
  elseif ($_GET['module']=='selesaibelanja'){
  include "$f[folder]/modul/produk/selesaibelanja.php";}
  ////////////////////////////////////////////////////////////

  // SIMPAN TRANSAKSI////////////////////////////////////////////
  elseif ($_GET['module']=='simpantransaksi'){
  include "$f[folder]/modul/produk/simpantransaksi.php";}
  ////////////////////////////////////////////////////////////

  // PROFILE ////////////////////////////////////////////
  elseif ($_GET['module']=='profilkami'){
  include "$f[folder]/modul/profil/tentangkami.php";}
  ////////////////////////////////////////////////////////

  // CARA BELI ////////////////////////////////////////////
  elseif ($_GET['module']=='carabeli'){
  include "$f[folder]/modul/carabeli/carabeli.php";}
  /////////////////////////////////////////////////////////

  // TESTIMONI////////////////////////////////////////////
  elseif ($_GET['module']=='testimoni'){
  include "$f[folder]/modul/testimoni/testimoni.php";}
  ////////////////////////////////////////////////////////

  // TESTIMONI AKSI ////////////////////////////////////////
  elseif ($_GET['module']=='testimoniaksi'){
  include "$f[folder]/modul/testimoni/testimoniaksi.php";}
  //////////////////////////////////////////////////////////

  // KATALOG ////////////////////////////////////////////
  elseif ($_GET['module']=='semuadownload'){
  include "$f[folder]/modul/katalog/katalog.php";}
  //////////////////////////////////////////////////////
  
  // DEATAIL HALAMAN STATIS ////////////////////////////////////////////
  elseif ($_GET['module']=='halamanstatis'){
  include "$f[folder]/modul/halaman/halaman.php";}
  /////////////////////////////////////////////////////////////

  // DEATAIL HALAMAN ERROR ////////////////////////////////////////////
  elseif ($_GET['module']=='notfound'){
  include "$f[folder]/modul/404/404.php";}
  /////////////////////////////////////////////////////////////

   // TAG ////////////////////////////////////////////
  elseif ($_GET['module']=='tag'){
  include "$f[folder]/modul/tag/tag.php";}
  /////////////////////////////////////////////////////////////

  // Modul Tampil Order/////////////////////////////////////////////////////
  elseif ($_GET['module']=='lihatorder'){
  include "member/lihat-order.php";}
  /////////////////////////////////////////////////////////////
  
  
  // Modul Daftar///////////////////////////////////////
  elseif ($_GET['module']=='daftar'){
  include "$f[folder]/modul/daftar/daftar.php";}
  /////////////////////////////////////////////////////////////

  // Modul Daftar///////////////////////////////////////
  elseif ($_GET['module']=='aksidaftar'){
  include "$f[folder]/modul/daftar/aksidaftar.php";}
  /////////////////////////////////////////////////////////////

  // Modul Login///////////////////////////////////////
  elseif ($_GET['module']=='login'){
  include "$f[folder]/modul/login/login.php";}
  /////////////////////////////////////////////////////////////


  // Modul Lupa Password///////////////////////////////////////
  elseif ($_GET['module']=='lupapassword'){
  include "$f[folder]/modul/password/lupapassword.php";}
  /////////////////////////////////////////////////////////////


  // Modul Kirim Password///////////////////////////////////////
  elseif ($_GET['module']=='kirimpassword'){
  include "$f[folder]/modul/password/kirimpassword.php";}
  /////////////////////////////////////////////////////////////

  ?>