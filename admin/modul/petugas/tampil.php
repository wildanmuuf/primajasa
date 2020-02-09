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
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=petugas"><i class="fa fa-users"></i> Petugas</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Petugas</h3><br><br>
              <a href="?m=petugas&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Petugas</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>

<?php
include "../sambungan.php";
$sql="SELECT * FROM petugas where level<>'admin' ORDER BY id_petugas";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
    if(empty($r['foto'])){
      $r['foto'] = "default.png";
    }
    echo "<td><img src='../images/petugas/".$r['foto']."' height='70px'/></td>";
		echo '<td><a href="index.php?m=petugas&s=detail&id='.$r['id_petugas'].'">'.$r['nama_lengkap'].'</a></td>';
		echo "<td>".$r['username']."</td>";
    echo '<td><a href="index.php?m=petugas&s=edit&idpe='.$r['id_petugas'].'"><i class="fa fa-edit"></i></a> | <a href="index.php?m=petugas&s=hapus&idpe='.$r['id_petugas'].'" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-trash-alt"></i></a></td>';
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
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
