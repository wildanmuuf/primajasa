<?php
error_reporting(0);
include_once "atas.php";
include_once "../sambungan.php";
$id_petugas = $_SESSION["id_petugas"];
$sql="SELECT tiket.*, jadwal.tujuan, kelas.nama_kelas,kelas.tipe_kursi, jadwal.jam, kelas.jumlah_kursi FROM tiket, jadwal, kelas WHERE jadwal.id_jadwal=tiket.id_jadwal and kelas.id_kelas=tiket.id_kelas and tiket.id_petugas='$id_petugas'";
$query=mysqli_query($koneksi,$sql);
/*$sjumlah="SELECT count(idpemilihan) as kandidat,idkandidat FROM datapemilihan GROUP BY idkandidat ORDER BY idkandidat";
$qjumlah=mysqli_query($koneksi,$sjumlah);
$j=mysqli_fetch_assoc($qjumlah);
*/
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pilih Tiket
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Riwayat Pesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

<?php
$now = date("h:i a");
//var_dump($sql);
while($r=mysqli_fetch_assoc($query)){
  $id_tiket = strval($r['id_tiket']);

  echo'<div class="col-lg-3 col-xs-6"> ';
  echo '<div class="small-box bg-aqua">';
    echo '<div class="inner">
      <h4>'.$r['nama_tiket'].'</h4>
      <p>'.$r['tujuan'].'</p>
      <p>'.$r['jam'].'</p>
      <p>&nbsp;</p>

    </div>
    <a class="small-box-footer" href="?m=riwayat_pesanan&s=pesanan&idt='.$r['id_tiket'].'">Detail &nbsp<i class="fa fa-search"></i></a>
  </div>
</div>';
}
?>
      </div>
      <!-- /.row -->
      <script type="text/javascript">
      function pilih_kursi (id_tiket)
      {
       var tgl = document.getElementById('tgl').value;
       var link = "?m=tiket&s=pilih_kursi&idt="+id_tiket+"&tgl="+tgl;
       window.location.href=link;
      }

      </script>
<?php include "bawah.php"; ?>
