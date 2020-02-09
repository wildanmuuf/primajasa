<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=jadwal"><i class="fa fa-calendar-alt"></i> Jadwal</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idp'];
include "../sambungan.php";
$sql="SELECT * FROM jadwal WHERE id_jadwal='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>Tujuan</td>
						<td><?php echo$r['nama_jadwal'];?></td>
					</tr>
          <tr>
						<td>Kategori</td>
						<td><?php echo $r['']?></td>
					</tr>
          <tr>
						<td>Jam</td>
						<td><?php echo $r['jam'];?></td>
					</tr>
          <tr>
						<td>Keterangan Penyakit</td>
						<td><?php echo$r['keterangan'];?></td>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=jadwal&s=edit&idp=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-edit"></i> Ubah</a>
						<a href="?m=jadwal" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
