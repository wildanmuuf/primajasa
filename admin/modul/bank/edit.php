<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bank
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=bank"><i class="fa fa-university"></i> Bank</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Bank</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idb'];
include "../sambungan.php";
$sql="SELECT * FROM bank WHERE id_bank='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=bank&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <input type="hidden" name="idb" class="form-control" value="<?php echo $r['id_bank'];?>"/>
                  <tr><td width="134px">Kode Bank</td><td><input type="text"  name="kode_bank" class="form-control" value="<?php echo $r['kode_bank'];?>"/></td></tr>
                  <tr>
        						<td>Nama Bank</td>
        						<td><input type="text" onkeypress="return onlynumber(event)" class="form-control" name="nama_bank" placeholder="Nama Bank" size="48.5" maxlength="50px" value="<?php echo $r['nama_bank'];?>" required/></td>
        					</tr>
                  <tr>
                    <td>Nama Penerima</td>
                    <td><input type="text" class="form-control" name="nama_penerima" placeholder="Nama Penerima" size="48.5" maxlength="50px" value="<?php echo $r['nama_penerima'];?>" required/></td>
                  </tr>
                  <tr>
                    <td>No Rekening</td>
                    <td><input type="text" onkeypress="return onlynumber(event)" class="form-control" name="no_rek" placeholder="Nomor Rekening" size="48.5" maxlength="50px" value="<?php echo $r['no_rekening'];?>" required/></td>
                  </tr>
                  <tr>
        						<td colspan=3>
                      <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
          						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
        						<a href="?m=bank" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
