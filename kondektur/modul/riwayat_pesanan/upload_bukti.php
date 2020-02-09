<?php
if(isset($_POST['simpan'])){
  include "../sambungan.php";
  include "../fungsi/upload.php";
  $folder="../images/bukti_pembayaran/";
  $id_pembayaran = $_POST['id_pembayaran'];
  $id_orders = $_POST['id_orders'];
  $lokasi =$_FILES['bukti_pembayaran']['tmp_name'];
  $link = "Location:index.php?m=scan_qrcode&s=detail&ido=".$id_orders;
  if(!empty($lokasi)){
    $namafile=$_FILES['bukti_pembayaran']['name'];
    $tipefile=$_FILES['bukti_pembayaran']['type'];
    if (!file_exists($folder)){
      mkdir($folder);
    }
    $ukuran=100;
    move_uploaded_file($lokasi, $folder.$namafile);
    $sql = "UPDATE pembayaran SET bukti_pembayaran='$namafile', status='Belum Valid' where id_pembayaran='$id_pembayaran'";
    $simpan=mysqli_query($koneksi,$sql);
    if($simpan){
     
      header($link);
    }else{
      echo '<script language="JavaScript">';
        echo 'alert("Data Gagal Ditambahkan.")';
      echo '</script>';
      
    }
  }
}
?>
