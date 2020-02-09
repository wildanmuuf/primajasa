<?php
error_reporting(0);
include_once "atas.php";
include_once "../sambungan.php";
$id_user = $_SESSION["id_kustomer"];
$sql="SELECT tiket.*, jadwal.tujuan, kelas.nama_kelas,kelas.tipe_kursi, jadwal.jam, kelas.jumlah_kursi FROM tiket, jadwal, kelas WHERE jadwal.id_jadwal=tiket.id_jadwal and kelas.id_kelas=tiket.id_kelas";
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
        Tiket
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Tiket</li>
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
      <p>'.$r['nama_tiket'].'</p>
      <p>&nbsp;</p>

    </div>
    <div class="icon">
              <i class="fa fa-bus"></i>
            </div>
    <a class="small-box-footer" href="#" value="'.$r['id_tiket'].'" data-toggle="modal"  data-target="#confirm'.$r['id_tiket'].'">Detail &nbsp<i class="fa fa-search"></i></a>
  </div>
  <div id="confirm'.$r['id_tiket'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg" role="document" height=200>
<div class="modal-content" style="background-image:url(\'../images/interior.png\');">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
 </button>
<center><b>
<p style="font-size: 30px; color:white;">'.$r['nama_tiket'].'</b></p>
</center>

</div>
<div class="modal-body">
<p style="font-size: 20px; color:white;">Tujuan : '.$r['tujuan'].'</p>
<p style="font-size: 20px; color:white;">Jam Keberangkatan : '.$r['jam'].'</p>
<p style="font-size: 20px; color:white;">Harga Tiket : '.$r['harga_tiket'].'</p>
<p style="font-size: 20px; color:white;">Jumlah Kursi : '.$r['jumlah_kursi'].' kursi</p>
<p style="font-size: 20px; color:white;">Tipe Kursi : '.$r['tipe_kursi'].' kursi</p>
<div class="form-group">
                <div class="input-group date" id="datetimepicker">
                    <input type="text" id="tgl" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            </div>
<div class="modal-footer"><center>
<input style="width:100px;" value="Pesan Tiket" class="btn btn-success" type="button" onclick="pilih_kursi(\''.$id_tiket.'\')"/>&nbsp&nbsp&nbsp&nbsp
<button style="width:100px;" class="btn btn-danger" type="button" data-dismiss="modal">Batal</button></center>
</div>
</div>
</div>
</div>
</div>';
}
?>
      </div>

      <!-- /.row -->
      <script src="../fungsi/bootstrap-datepicker/moment.js"></script>
      <script src="../fungsi/bootstrap-datepicker/bootstrap-datepicker.js"></script>
      <script type="text/javascript">
      $(function(){
        $(".date").datetimepicker({
            format: 'YYYY-MM-DD',
            locale:'id',
            minDate: moment()
        });
        });
      </script>
      <script type="text/javascript">
      function pilih_kursi (id_tiket)
      {
       var tgl = document.getElementById('tgl').value;
       var link = "?m=tiket&s=pilih_kursi&idt="+id_tiket+"&tgl="+tgl;
       window.location.href=link;
      }

      </script>
<?php include "bawah.php"; ?>
