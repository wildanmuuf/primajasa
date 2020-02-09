<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Pembayaran
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><i class="fa fa-bug"></i> Riwayat Pembayaran</a></li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Riwayat Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$id_kustomer = $_SESSION['id_kustomer'];
$sql="SELECT pembayaran.*, orders.id_orders FROM orders, pembayaran where orders.id_kustomer='$id_kustomer' and pembayaran.id_orders = orders.id_orders GROUP BY pembayaran.id_pembayaran ORDER by pembayaran.id_pembayaran";
$query=mysqli_query($koneksi,$sql);

if(mysqli_num_rows($query)==0){
    echo'          <table id="null" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Kode Pembayaran</th>
                  <th>Bukti Pembayaran</th>
                  <th>Metode Pembayaran</th>
                  <th>QRCode</th>
                </tr>
                </thead>
                <tbody>
         ';
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
    echo'          <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Kode Pembayaran</th>
                  <th>Bukti Pembayaran</th>
                  <th>Metode Pembayaran</th>
                  <th>QRCode</th>
                </tr>
                </thead>
                <tbody>
        ';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
    $detail_kursi = "SELECT id_orders from detail_kursi where id_orders='$r[id_orders]'";
    $query_detail=mysqli_query($koneksi,$detail_kursi);
    $jumlah_kursi = mysqli_num_rows($query_detail);
	  echo "<tr>";
		echo "<td>".$r['id_pembayaran']."</td>";
	  echo "<td>".$r['status']."</td>";
    echo "<td>".$r['metode_pembayaran']."</td>";
    if(($r['metode_pembayaran'] == "Via Bank" && $r['bukti_pembayaran'] != "") || $r['metode_pembayaran'] == "Ditempat"){
      echo '<td><center><a class="btn btn-sm btn-primary" style="maxwidth:100%;" type="button" href="index.php?m=pembayaran&s=cetak_qrcode&ido='.$r['id_orders'].'">Cetak &nbsp<i class="fa fa-print "></i></a></center></td>';
    }else{
      echo '<td><center><a class="btn btn-sm btn-danger" disabled style="maxwidth:100%;" href="#">Cetak &nbsp<i class="fa fa-print "></i></a></center></td>';
    }
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>Kode Pembayaran</th>
                  <th>Bukti Pembayaran</th>
                  <th>Metode Pembayaran</th>
                  <th>QRCode</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<?php include "bawah.php"; ?>
