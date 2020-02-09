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
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idj'];
include "../sambungan.php";
$sql="SELECT * FROM jadwal WHERE id_jadwal='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=jadwal&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <tr><td width="134px">Kode Jadwal</td><td><input type="text"  name="idj" class="form-control" value="<?php echo $r['id_jadwal'];?>" readonly/></td></tr>
					<tr>

						<td>Tujuan</td>
            <td><input type="text" class="form-control" name="tujuan" placeholder="Tujuan" size="48.5" maxlength="50px" value="<?php echo $r['tujuan'];?>" required/></td>
					</tr>
          <tr>
						<td>Jam</td>
						<td>
              <div class="input-group clockpicker">
              <?php $now = date("h:i a");?>
                <input type="text" class="form-control" name="jam" value=<?php echo $r['jam']; ?>>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </td>
					</tr>
          <tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
  						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
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
    <script type="text/javascript">

    </script>
<?php include "bawah.php"; ?>
