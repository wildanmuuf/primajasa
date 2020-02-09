<?php include "atas.php";
$id=$_GET['idt'];
$kode = $_GET['ido'];
$tgl = $_GET['tgl'];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemesanan Tiket
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=tiket"><i class="fa fa-ticket-alt"></i> Tiket</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="?m=tiket&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                  <?php
                  include "../sambungan.php";

                $sql="SELECT detail_kursi_temp.*, tiket.*, jadwal.tujuan, kelas.nama_kelas, jadwal.jam FROM tiket, jadwal, kelas, detail_kursi_temp WHERE jadwal.id_jadwal=tiket.id_jadwal and kelas.id_kelas=tiket.id_kelas and detail_kursi_temp.id_tiket_temp = tiket.id_tiket and tiket.id_tiket='$id' ";
                $query=mysqli_query($koneksi,$sql);
                $r=mysqli_fetch_array($query);
                
                $sql1="SELECT * FROM detail_kursi_temp WHERE id_orders_temp='$kode'";
                $query1=mysqli_query($koneksi,$sql1);
                $count_kursi=mysqli_num_rows($query1);
                $total = $r['harga_tiket']*$count_kursi;
                  ?>
                <tbody>
          <tr>
  					<td width="174px">Kode Pesanan</td>
            <input type="text" name="id_orders" value="<?php echo $kode; ?>" hidden/>
            <input type="text" name="tgl_berangkat" value="<?php echo $tgl; ?>" hidden/>
  					<td><?php echo $kode;?></td>
  				</tr>
					<tr>
						<td width="174px">Nama Tiket</td>
						<td><?php echo$r['nama_tiket'];?></td>
					</tr>
					<tr>
						<td>Tujuan</td>
						<td><?php echo$r['tujuan'];?></td>
					</tr>
          <tr>
						<td>Jam</td>
						<td><?php echo$r['jam'];?></td>
					</tr>
          <tr>
						<td>Tanggal Berangkat</td>
						<td><?php echo $tgl;?></td>
					</tr>
					<tr>
						<td>Tiket</td>
						<td><?php echo$r['nama_kelas'];?></td>
					</tr>
          <tr>
            <input type="text" id="hrg" class="CalculateMe" value="<?php echo $r['harga_tiket']; ?>" hidden/>
						<td>Harga Tiket</td>
						<td><?php echo "Rp. ".$r['harga_tiket'];?></td>
					</tr>
          <tr>
						<td>Jumlah</td>
						<td><?php echo $count_kursi;?></td>
					</tr>
          <tr>
						<td>Total</td>
            <input type="text" id="total" name="total" class="CalculateMe" value="<?php echo$total; ?>" hidden/>
						<td><?php echo $total;?></td>
					</tr>
					<tr>
						<td colspan=2>
						<button type="submit" name="simpan" class="btn btn-large btn-success" ><i class="fa fa-check"></i> Selanjutnya</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=tiket&s=pilih_kursi&idt=<?php echo $id;?>&tgl=<?php echo $tgl;?>" style="width:100px;" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Batal</a></td>
					</tr>
                </tbody>
              </table>
			 </form>
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
    <script type="text/javascript">
      function onlynumber(e){
        var numChar = (e.which) ? e.which : event.keyCode
        if(numChar > 31 && (numChar < 48 || numChar > 57))
        return false;
      return true;
      }
    </script>
<?php include "bawah.php"; ?>
