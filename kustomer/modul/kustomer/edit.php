<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=kustomer"><i class="fa fa-user"></i> Profil</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Profil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['id'];
include "../sambungan.php";
$sql="SELECT * FROM kustomer WHERE id_kustomer='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=kustomer&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
          <input type="text" name="id" hidden size="25px" maxlength="25px" value="<?php echo$r['id_kustomer'];?>" required />
          <tr>
            <td width=150>NIK</td>
            <td><input class="form-control" type="text" name="nik" placeholder="Nomor Induk Kependudukan" size="25px" maxlength="16px" value="<?php echo $r['nik'];?>" required /></td>
          </tr>
          <tr>
						<td width=150>Nama Kustomer</td>
						<td><input class="form-control" type="text" name="nama_lengkap" placeholder="Nama Kustomer" size="25px" maxlength="50px" value="<?php echo$r['nama_lengkap'];?>" required /></td>
					</tr>
          <tr>
						<td width=150>Username *</td>
						<td><input class="form-control" type="text" name="username" placeholder="Username" size="25px" maxlength="25px" value="<?php echo$r['username'];?>" required /></td>
					</tr>
					<tr>
						<td>Sandi</td>
						<td><input class="form-control" type="password" name="password" placeholder="Password" size="25px" maxlength="32px" /><small>Kosongkan jika tak diubah</small></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name="jk" id="jkl" value="L" <?php if($r['jenis_kelamin']=='L') echo " checked";?> />Laki-laki &nbsp;&nbsp;
						<input type="radio" name="jk" id="jkp" value="P" <?php if($r['jenis_kelamin']=='P') echo " checked";?> />Perempuan</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td><input type="date" name="tanggal" class="form-control" placeholder="Tanggal Lahir" value="<?php echo$r['tgl_lahir']; ?>" /></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><input type="text" name="hp" class="form-control" placeholder="HP" size="15px" maxlength="15px" value="<?php echo$r['telpon'];?>" /></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td><input class="form-control" type="email" name="surel" placeholder="Email" size="50px" maxlength="50px" value="<?php echo$r['email'];?>" /></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['foto']!=''){
						  echo'<img src="../images/kustomer/'.$r['foto'].'" height=150 />';
						}
						else{
						  echo "<img src=\"../images/kustomer/default.png\" height=150>";
						}
?>
					</tr>
					<tr>
						<td>Ganti Foto</td>
						<td><input type="file" name="foto" accept="image/*" /><small>Kosongkan jika foto tak diganti</small></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
            <a href="?m=kustomer" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
