<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelas
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=jenis_kucing"><i class="fa fa-list"></i> Kelas</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idk'];
include "../sambungan.php";
$sql="SELECT * FROM kelas WHERE id_kelas='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  
					<tr>
						<td width=150>Kelas</td>
						<td><?php echo$r['nama_kelas'];?></td>
					</tr>
          <tr>
						<td>Jumlah Kursi</td>
						<td><?php echo $r['jumlah_kursi']?></td>
					</tr>

					<tr>
						<td colspan=2>
						<a href="?m=kelas&s=edit&idk=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-edit"></i> Ubah</a>
						<a href="?m=kelas" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
