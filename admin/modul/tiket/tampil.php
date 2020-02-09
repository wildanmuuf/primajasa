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
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=tiket"><i class="fa fa-ticket-alt"></i> Tiket</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Tiket</h3><br><br>
			  <a href="?m=tiket&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Tiket</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php
include "../sambungan.php";
$sql="SELECT*from tiket order by id_tiket";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
	echo '              <table id="null" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Nopol</th>
                  <th>Nama Tiket</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>';
	echo "<td colspan='9'>Data Masih Kosong</td>";
}else{
	echo '              <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Kode</th>
                  <th>Nama Tiket Tiket</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		//echo "<td>$no</td>";
    echo "<td>".$r['id_tiket']."</td>";

		echo "<td><a href='?m=tiket&s=detail&idt=".$r['id_tiket']."'>".$r['nama_tiket']."</a></td>";
		echo '<td width=60><a href="index.php?m=tiket&s=edit&idt='.$r['id_tiket'].'"><i class="fa fa-edit"></i></a> | <a href="index.php?m=tiket&s=hapus&idt='.$r['id_tiket'].'" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-trash-alt"></i></a></td>';
	  echo "</tr>";
		//$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Nama Tiket Tiket</th>
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
