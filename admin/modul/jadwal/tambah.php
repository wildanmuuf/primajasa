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
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=jadwal"><i class="fa fa-calendar-alt"></i> Jadwal</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=jadwal&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <?php
                    include "../sambungan.php";
                    $query = "SELECT SUBSTRING(MAX(id_jadwal),2,4) as maxKode FROM jadwal ";
                  	$hasil = mysqli_query($koneksi,$query);
                  	$data = mysqli_fetch_array($hasil);
                    $count = (int) $data['maxKode'];

                  	$count++;
                  	$char = "J";
                  	$kode = $char . sprintf("%04s", $count);
                  ?>
          <tr>
  					<td width="134px">Kode Jadwal</td>
  					<td><input type="text" class="form-control" name="id_jadwal" placeholder="Kode Jadwal" size="48.5" maxlength="50px" value=<?php echo $kode;?> readonly/></td>
  				</tr>
					<tr>
						<td>Tujuan</td>
						<td><input type="text" class="form-control" name="tujuan" placeholder="Jadwal" size="48.5" maxlength="50px" required/></td>
					</tr>

          <tr>
            <td>Jam</td>
            <td>
              <div class="input-group clockpicker">
              <?php $now = date("h:i a");?>
                <input type="text" class="form-control" name="jam" value=<?php echo $now; ?> />
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
    	function onlynumber(e){
    		var numChar = (e.which) ? e.which : event.keyCode
    		if(numChar > 31 && (numChar < 48 || numChar > 57))
    		return false;
    	return true;
    	}
    </script>
<?php include "bawah.php"; ?>
