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
        <li><a href="?m=kelas"><i class="fa fa-list"></i> Kelas</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Kelas</h3>
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
			 <!--Mulai buat form-->
			 <form action="?m=kelas&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
          <tr>
            <td>Kode Kelas</td>
            <td><input type="text" class="form-control" name="id_kelas" readonly placeholder="Kode Kelas" size="25px" maxlength="25px" value="<?php echo$r['id_kelas'];?>" required /></td>
          </tr>
          <tr>
						<td width=150>Kelas</td>
						<td colspan="2"><input type="text" class="form-control" name="nama_kelas" placeholder="Kelas" size="25px" maxlength="25px" value="<?php echo$r['nama_kelas'];?>" required /></td>
					</tr>

					<tr>
						<td>Jumlah Kursi</td>
						<td><input type="text" class="form-control" name="jumlah_kursi" placeholder="Masa Hidup" size="25px" maxlength="5px" value="<?php echo$r['jumlah_kursi'];?>" required /></td>
					</tr>
          <tr>
						<td width=174>Tipe Kursi</td>
						<td><label class="radio-inline"><input type="radio" value="2-3" name="tipe_kursi" <?php if($r['tipe_kursi']=="2-3"){ echo "checked";}?>> 2-3</label>
            <label class="radio-inline"><input type="radio" value="2-2" name="tipe_kursi"  <?php if($r['tipe_kursi']=="2-2"){ echo "checked";}?>> 2-2</label></td>
					</tr>
					<tr>
						<td colspan=3>
						<button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
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
