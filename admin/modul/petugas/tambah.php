<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Petugas
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=petugas"><i class="fa fa-users"></i> Petugas</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Petugas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=petugas&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td>Nama Lengkap</td>
						<td><input type="text" onkeypress="return validate(event)" id="onlytext" class="form-control" name="nama_petugas" placeholder="Nama Petugas" size="48.5" maxlength="50px" required/></td>
					</tr>
          <tr>
						<td width=150>Username *</td>
						<td><input class="form-control" type="text" name="username" placeholder="Username" size="25px" maxlength="25px" required /></td>
					</tr>
					<tr>
						<td>Sandi</td>
						<td><input class="form-control" type="password" name="password" placeholder="Password" size="25px" maxlength="32px" required/></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name="jk" checked value="L"/> Laki-laki &nbsp;&nbsp;
						<input type="radio" name="jk" value="P"/> Perempuan</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td><input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required/></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td><input type="text" name="telepon" class="form-control" placeholder="Telepon" size="15px" maxlength="15px" required/></td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td><input class="form-control" type="email" name="email" placeholder="Email" size="50px" maxlength="50px" /></td>
					</tr>
          <tr>
						<td>Alamat</td>
						<td><textarea name="alamat" class="form-control" placeholder="Alamat" size="50px" maxlength="500px" required></textarea></td>
					</tr>
          <tr>
            <td>Hak Akses</td>
            <td colspan="3"><select class="form-control" name="level">
              <option value="kondektur">Kondektur</option>
              <option value="admin">Administrator</option>
              </select>
            </td>
					<tr>
						<td>Ganti Foto</td>
						<td><input class="form-control-file" type="file" name="foto" accept="image/*" /></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
  						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=petugas" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
        console.log(numChar)
    		return false;
    	return true;
    	}
      function validate(e) {
        var numChar = (e.which) ? e.which : event.keyCode
        console.log(numChar);
        if(numChar >= 48 && numChar <= 57){
          return false;
        }
      return true;
      }
    </script>
<?php include "bawah.php"; ?>
