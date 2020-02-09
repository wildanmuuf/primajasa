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
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Tiket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idt'];
include "../sambungan.php";
//$sql="SELECT * FROM tiket WHERE id_tiket='$id'";
$sql="SELECT tiket.*, jadwal.tujuan, kelas.nama_kelas, jadwal.jam FROM tiket, jadwal, kelas WHERE jadwal.id_jadwal=tiket.id_jadwal and kelas.id_kelas=tiket.id_kelas and tiket.id_tiket='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=tiket&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
          <tr>
						<td width=150>Kode Tiket</td>
						<td colspan="3"><input type="text" class="form-control" readonly name="id_tiket" placeholder="Kode Tiket" size="25px" maxlength="100px" value="<?php echo$r['id_tiket'];?>" required /></td>
					</tr>
					<tr>
						<td width=150>Nama Tiket</td>
						<td colspan="3"><input type="text" class="form-control" name="nama_tiket" placeholder="Nama Tiket" size="25px" maxlength="100px" value="<?php echo$r['nama_tiket'];?>" required /></td>
					</tr>
          <tr>
            <td>Tujuan</td>
            <td colspan="3"><select class="form-control" name="jadwal">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from jadwal";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r1=mysqli_fetch_assoc($query)) {
                  if($r1['id_jadwal']==$r['id_jadwal']){
                    echo '<option value='.$r1['id_jadwal'].' selected>'.$r1['tujuan'].' || '.$r1['jam'].' </option>';
                  }else{
                    echo '<option value='.$r1['id_jadwal'].'>'.$r1['tujuan'].' || '.$r1['jam'].' </option>';
                  }

                }
            ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td colspan="3"><select class="form-control" name="kelas">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from kelas";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r2=mysqli_fetch_assoc($query)) {
                  if($r2['id_kelas']==$r['id_kelas']){
                    echo '<option value='.$r2['id_kelas'].' selected>'.$r2['nama_kelas'].'</option>';
                  }else{
                    echo '<option value='.$r2['id_kelas'].'>'.$r2['nama_kelas'].'</option>';
                  }
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
                $sql3 = "SELECT* from petugas where level='kondektur'";
                $q3=mysqli_query($koneksi,$sql3);
                while ($r3=mysqli_fetch_assoc($q3)) {
                  if($r3['id_petugas']==$r['id_petugas']){
                    echo '<option value='.$r3['id_petugas'].' selected>'.$r3['nama_lengkap'].'</option>';
                  }else{
                    echo '<option value='.$r3['id_petugas'].'>'.$r3['nama_lengkap'].'</option>';
                  }
                }
            ?>
              </select>
            </td>
          </tr>
          <tr>
						<td width="174px">Harga Tiket</td>
            <td align="center" width="15px"><font size="3">Rp. </font></td>
						<td><input type="number" required class="form-control" name="harga_tiket" placeholder="Harga Tiket" size="25px" onKeyPress="if(this.value.length==10){ return false;}" value=<?php echo $r['harga_tiket'] ?> /></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
  						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
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

  var $preview = $('#preview').empty();
  if (this.files) $.each(this.files, readAndPreview);

  function readAndPreview(i, file) {

    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
      return alert(file.name +" is not an image");
    } // else...

    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:150}));
    });

    reader.readAsDataURL(file);

  }

}

$('#file-input').on("change", previewImages);
    </script>
<?php include "bawah.php"; ?>
