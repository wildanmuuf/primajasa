<?php include "atas.php";
include "../sambungan.php";
$id_tiket = $_GET['idt'];
$id_petugas = $_SESSION['id_petugas'];
$sqlTampil="SELECT orders.id_orders,tiket.nama_tiket, orders.total, pembayaran.id_pembayaran, pembayaran.status, pembayaran.metode_pembayaran, orders.status_orders, jadwal.jam, kelas.nama_kelas FROM orders, tiket, jadwal,kelas, detail_kursi, pembayaran where tiket.id_petugas='$id_petugas' and tiket.id_tiket='$id_tiket' and orders.id_orders = pembayaran.id_orders and tiket.id_tiket = detail_kursi.id_tiket and tiket.id_kelas = kelas.id_kelas and tiket.id_jadwal=jadwal.id_jadwal and orders.id_orders = detail_kursi.id_orders GROUP BY orders.id_orders ORDER by orders.id_orders";
$qTampil=mysqli_query($koneksi,$sqlTampil);
$sqlnama_tiket = "SELECT nama_tiket from tiket where id_tiket='$id_tiket'";
$tiket=mysqli_query($koneksi,$sqlnama_tiket);
$nama_tiket = mysqli_fetch_assoc($tiket);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pesanan
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><i class="fa fa-bug"></i> Pesanan</a></li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Pesanan <?php echo $nama_tiket['nama_tiket']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php


if(mysqli_num_rows($qTampil)==0){
    echo'          <table id="null" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Kode Pesanan</th>
                  <th>Jam</th>
                  <th>Jumlah Kursi</th>
                  <th>Total</th>
                  <th>Status Pesanan</th>
                  <th>Metode Pembayaran</th>
                  <th>Validasi</th>
                </tr>
                </thead>
                <tbody>
         ';
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
    echo'          <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Kode Pesanan</th>
                  <th>Jam</th>
                  <th>Jumlah Kursi</th>
                  <th>Total</th>
                  <th>Status Pesanan</th>
                  <th>Metode Pembayaran</th>
                  <th>Validasi</th>
                </tr>
                </thead>
                <tbody>
        ';
	$no=1;
	while($tampil=mysqli_fetch_assoc($qTampil)){
    $detail_kursi = "SELECT id_orders from detail_kursi where id_orders='$tampil[id_orders]'";
    $query_detail=mysqli_query($koneksi,$detail_kursi);
    $jumlah_kursi = mysqli_num_rows($query_detail);
	  echo "<tr>";
		echo "<td>".$tampil['id_orders']."</td>";
    echo "<td>".$tampil['jam']."</td>";
    echo '';
    echo "<td>".$jumlah_kursi."</td>";
    echo "<td>".$tampil['total']."</td>";
    echo "<td>".$tampil['status_orders']."</td>";
    echo "<td>".$tampil['metode_pembayaran']."</td>";
    echo "<td>".$tampil['status']."</td>";
	  echo "</tr>";
		$no++;?>
    
	<?php }
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>Kode Pesanan</th>
                  <th>Jam</th>
                  <th>Jumlah Kursi</th>
                  <th>Total</th>
                  <th>Status Pesanan</th>
                  <th>Metode Pembayaran</th>
                  <th>Validasi</th>
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
