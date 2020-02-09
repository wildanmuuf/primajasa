<?php
if(isset($_POST['simpan'])){
  include "../sambungan.php";
  $id_pembayaran = $_POST['id_pembayaran'];
  $id_orders = $_POST['id_orders'];
  $id_tiket = $_POST['id_tiket'];
  $sql1 = "UPDATE pembayaran SET status='Valid' where id_pembayaran='$id_pembayaran'";
  $simpan=mysqli_query($koneksi,$sql1);
  $link = 'Location:index.php?m=scan_qrcode';
  if($simpan){
    $sql2 = "UPDATE orders SET status_orders='Lunas' where id_orders='$id_orders'";
    $simpan1=mysqli_query($koneksi,$sql2);
    if($simpan1){
      
      header($link);
    }
  }else{
    echo '<script language="JavaScript">';
      echo 'alert("Data Gagal Ditambahkan.")';
    echo '</script>';
    //echo("Error description: " . mysqli_error($koneksi));
  }
}
?>
