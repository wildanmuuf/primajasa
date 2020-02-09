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
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Tiket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=tiket&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <?php
                    include "../sambungan.php";
                    $query = "SELECT SUBSTRING(MAX(id_tiket),2,4) as maxKode FROM tiket ";
                  	$hasil = mysqli_query($koneksi,$query);
                  	$data = mysqli_fetch_array($hasil);
                    $count = (int) $data['maxKode'];

                  	$count++;
                  	$char = "T";
                  	$kode = $char . sprintf("%04s", $count);
                  ?>
                  <tr>
        						<td width=150>Kode Tiket</td>
        						<td colspan="3"><input type="text" class="form-control" name="tiket" readonly placeholder="Nomor Polisi" size="25px" maxlength="100px" value="<?php echo $kode;?>" required /></td>
        					</tr>
					<tr>
						<td width="174px">Nama Tiket</td>
						<td colspan="3"><input type="text" required class="form-control" name="nama_tiket" placeholder="Nama Tiket" size="25px" maxlength="50px" /></td>
					</tr>
          <tr>
            <td>Tujuan</td>
            <td colspan="3"><select class="form-control" name="jadwal">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from jadwal";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r=mysqli_fetch_assoc($query)) {
                  echo '<option value='.$r['id_jadwal'].'>'.$r['tujuan'].' || '.$r['jam'].' </option>';
                }
            ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td colspan="2"><select class="form-control" name="kelas">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from kelas";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r=mysqli_fetch_assoc($query)) {
                  echo '<option value='.$r['id_kelas'].'>'.$r['nama_kelas'].'</option>';
                }
            ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Kondektur</td>
            <td colspan="3"><select class="form-control" name="kondektur">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from petugas where level='kondektur'";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r=mysqli_fetch_assoc($query)) {
                  echo '<option value='.$r['id_petugas'].'>'.$r['nama_lengkap'].'</option>';
                }
            ?>
              </select>
            </td>
          </tr>
          <tr>
						<td width="174px">Harga Tiket</td>
            <td align="center" width="15px"><font size="3">Rp. </font></td>
						<td><input type="number" required class="form-control" name="harga_tiket" placeholder="Harga Tiket" size="25px" onKeyPress="if(this.value.length==10){ return false;}"/></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
  						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bershikan</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=tiket" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
      function previewImages() {

  var preview = document.querySelector('#preview');

  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...

    var reader = new FileReader();

    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 200;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });

    reader.readAsDataURL(file);

  }

}

document.querySelector('#file-input').addEventListener("change", previewImages);
    </script>
<?php include "bawah.php"; ?>
