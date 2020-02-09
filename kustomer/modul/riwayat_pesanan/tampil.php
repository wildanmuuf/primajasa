<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Pesanan
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><i class="fa fa-bug"></i> Riwayat Pesanan</a></li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Riwayat Pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$id_kustomer = $_SESSION['id_kustomer'];
$sql="SELECT orders.id_orders, orders.total, pembayaran.id_pembayaran, pembayaran.status, pembayaran.metode_pembayaran, orders.status_orders, jadwal.tujuan, jadwal.jam, kelas.nama_kelas FROM orders, tiket, jadwal,kelas, detail_kursi, pembayaran where orders.id_kustomer='$id_kustomer'and orders.id_orders = pembayaran.id_orders and tiket.id_tiket = detail_kursi.id_tiket and tiket.id_kelas = kelas.id_kelas and tiket.id_jadwal=jadwal.id_jadwal and orders.id_orders = detail_kursi.id_orders GROUP BY orders.id_orders ORDER by orders.id_orders";
$query=mysqli_query($koneksi,$sql);

if(mysqli_num_rows($query)==0){
    echo'          <table id="null" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Tujuan|Jam</th>
                  <th>Status</th>
                  <th>Metode Pembayaran</th>
                  <th width="100px">Bayar</th>
                </tr>
                </thead>
                <tbody>
         ';
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
    while($r=mysqli_fetch_assoc($query)){
?>
    <div class="modal fade" id="confirm<?php echo $r['id_orders']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="?m=pembayaran&s=upload_bukti" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Via Bank</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label for="bukti">Bukti Pembayaran</label>
                <input type="hidden" id="id_orders" name="id_orders" value="<?php echo $r['id_orders'];?>">
                <input type="file" name="bukti_pembayaran" id="bukti" accept="image/*" /><br>
            <?php
                if($r['metode_pembayaran'] == "Via Bank"){
                    $sql_detail1 = "SELECT bank.* from detail_pembayaran, bank where detail_pembayaran.id_pembayaran = '$r[id_pembayaran]' and bank.id_bank = detail_pembayaran.id_bank";
                    $query2 = mysqli_query($koneksi, $sql_detail1);
                    $r2=mysqli_fetch_assoc($query2);
                    
            ?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=200>Kode Bank</td>
						<td><?php echo$r2['kode_bank'];?></td>
					</tr>
          <tr>
						<td>Nama Bank</td>
						<td><?php echo$r2['nama_bank'];?></td>
					</tr>
					<tr>
						<td>Nama Penerima</td>
						<td><?php echo $r2['nama_penerima'];?></td>
					</tr>

          <tr>
						<td>No Rekening</td>
						<td><?php echo $r2['no_rekening'];?></td>
					</tr>
                </tbody>
              </table>
              <?php }?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Tutup</button>
              <input type="submit" value="Simpan" name="simpan" class="btn btn-primary pull-right"/>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="detail<?php echo $r['id_orders']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Detail Kode Transaksi <?php echo $r['id_orders']?> </h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <table id="notNull" class="table table-bordered table-hover table-striped">
                <tbody>
    		<tr>
    			<td width="120px">Tujuan</td>
    			<td><?php echo$r['tujuan'];?></td>
    		</tr>
          <tr>
            <td>Jam</td>
            <td><?php echo$r['jam'];?></td>
          </tr>
          <tr>
            <td>No Kursi</td>
            <td><?php
            $i = 0;
            $sqlNo="SELECT no_kursi from detail_kursi where id_orders='$r[id_orders]'";
            $qNo=mysqli_query($koneksi,$sqlNo);
            $count = mysqli_num_rows($qNo);
              while($r1=mysqli_fetch_assoc($qNo)){
                $i++;
                echo $r1['no_kursi'];
                if($i != $count){
                  echo ", ";
                }
              } ?></td>
          </tr>
          <tr>
            <td>Metode Pembayaran</td>
            <td><?php echo$r['metode_pembayaran'];?></td>
          </tr>
          <tr>
            <td>Status Pembayaran</td>
            <td><?php echo$r['status'];?></td>
          </tr>
          <tr>
            <td>Status Pesanan</td>
            <td><?php echo$r['status_orders'];?></td>
          </tr>
          <tr>
            <td>Total</td>
            <td><?php echo$r['total'];?></td>
          </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Tutup</button>
            </div>
        </div>
      </div>
    </div>
    <?php }
    
    echo'          <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>Tujuan|Jam</th>
                  <th>Status</th>
                  <th>Metode Pembayaran</th>
                  <th width="100px">Bayar</th>
                </tr>
                </thead>
                <tbody>
        ';
	$no=1;
	$query1=mysqli_query($koneksi,$sql);
	while($r1=mysqli_fetch_assoc($query1)){
    $detail_kursi = "SELECT id_orders from detail_kursi where id_orders='$r1[id_orders]'";
    $query_detail=mysqli_query($koneksi,$detail_kursi);
    $jumlah_kursi = mysqli_num_rows($query_detail);
	  echo "<tr>";
	  echo '<td><center><a style="maxwidth:100%;" href="#" type="button" data-toggle="modal"  data-target="#detail'.$r1['id_orders'].'">'.$r1['tujuan'].' | '.$r1['jam'].'</a></center></td>';
    echo "<td>".$r1['status_orders']."</td>";
    echo "<td>".$r1['metode_pembayaran']."</td>";
    if($r1['metode_pembayaran'] == "Via Bank" && $r1['status_orders'] == "Belum Lunas" && $r1['status'] == "Belum Valid"){
      echo '<td><center><a class="btn btn-sm btn-primary" style="maxwidth:100%;" href="#" type="button" data-toggle="modal"  data-target="#confirm'.$r1['id_orders'].'">Bayar &nbsp<i class="fa fa-credit-card "></i></a></center></td>';
    }else{
      echo '<td><center><a class="btn btn-sm btn-danger" disabled style="maxwidth:100%;" href="#" type="button" data-toggle="modal"  data-target="#confirm">Bayar &nbsp<i class="fa fa-credit-card "></i></a></center></td>';
    }
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>Tujuan|Jam</th>
                  <th>Status Pesanan</th>
                  <th>Metode Pembayaran</th>
                  <th>Bayar</th>
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
