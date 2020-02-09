<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tiket
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
              <h3 class="box-title">Detail Tiket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idt'];
include "../sambungan.php";
$sql="SELECT tiket.*, jadwal.tujuan, kelas.nama_kelas, jadwal.jam, petugas.nama_lengkap FROM tiket, jadwal, kelas, petugas WHERE petugas.id_petugas=tiket.id_petugas and jadwal.id_jadwal=tiket.id_jadwal and kelas.id_kelas=tiket.id_kelas and tiket.id_tiket='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
          <tr>
  					<td width="174px">Kode Tiket</td>
  					<td><?php echo$r['id_tiket'];?></td>
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
						<td>Kelas</td>
						<td><?php echo$r['nama_kelas'];?></td>
					</tr>
          <tr>
						<td>Kondektur</td>
						<td><?php echo$r['nama_lengkap'];?></td>
					</tr>
          <tr>
						<td>Harga Tiket</td>
						<td><?php echo$r['harga_tiket'];?></td>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=tiket&s=edit&idt=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-edit"></i> Edit</a>
						<a href="?m=tiket" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> List</a></td>
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
<?php include "bawah.php"; ?>
