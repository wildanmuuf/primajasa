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
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Jadwal</h3><br><br>
			  <a href="?m=jadwal&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Jadwal</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$sql="SELECT * FROM jadwal ORDER BY id_jadwal";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
  echo '<table id="null" class="table table-bordered table-hover table-striped">
    <thead>
    <tr bgcolor="#ccc">
      <th>Kode</th>
      <th>Tujuan</th>
      <th>Jam</th>
      <th>Opsi</th>
    </tr>
    </thead>
    <tbody>';
    echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
  echo '<table id="notNull" class="table table-bordered table-hover table-striped">
    <thead>
    <tr bgcolor="#ccc">
      <th>Kode</th>
      <th>Tujuan</th>
      <th>Jam</th>
      <th>Opsi</th>
    </tr>
    </thead>
    <tbody>';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		//echo "<td>$no</td>";
    echo "<td>".$r['id_jadwal']."</td>";
		echo "<td>".$r['tujuan']."</td>";
		echo "<td>".$r['jam']."</td>";
		echo '<td><a href="index.php?m=jadwal&s=edit&idj='.$r['id_jadwal'].'"><i class="fa fa-edit"></i></a> | <a href="index.php?m=jadwal&s=hapus&idj='.$r['id_jadwal'].'" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-trash-alt"></i></a></td>';
	  echo "</tr>";
		//$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>Kode</th>
                  <th>Tujuan</th>
                  <th>Jam</th>
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
