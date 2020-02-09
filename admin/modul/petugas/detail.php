<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Petugas
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=petugas"><i class="fa fa-users"></i>Petugas</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profil Petugas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['id'];
include "../sambungan.php";
$sql="SELECT * FROM petugas WHERE id_petugas='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>Nama Petugas</td>
						<td><?php echo$r['nama_lengkap'];?></td>
					</tr>
          <tr>
						<td width=150>Username</td>
						<td><?php echo$r['username'];?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo $r['jenis_kelamin']=='L'?'Laki-laki':'Perempuan';?></td>
					</tr>

          <tr>
						<td>Tanggal Lahir</td>
						<td><?php echo$r['tgl_lahir'];?></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><?php echo$r['telpon'];?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo$r['email'];?></td>
					</tr>
          <tr>
						<td>Alamat</td>
						<td><?php echo$r['alamat'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['foto']!=''){
						  echo "<img src=\"../images/petugas/$r[foto]\" height=150 />";
						}
						else{
						  echo "<img src=\"../images/petugas/default.png\" height=150>";
						}
?>
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
