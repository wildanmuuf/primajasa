<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Scan QRCode
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=pesanan"><i class="fa fa-qrcode"></i> Scan QRCode</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['ido'];
include "../sambungan.php";
$sql="SELECT orders.*, tiket.id_tiket, tiket.nama_tiket, pembayaran.id_pembayaran, jadwal.tujuan, jadwal.jam, kustomer.nama_lengkap, pembayaran.status, pembayaran.metode_pembayaran, pembayaran.bukti_pembayaran FROM orders, tiket, jadwal,kelas, detail_kursi, pembayaran, kustomer where orders.id_orders='$id'and orders.id_orders = pembayaran.id_orders and tiket.id_tiket = detail_kursi.id_tiket and tiket.id_kelas = kelas.id_kelas and tiket.id_jadwal=jadwal.id_jadwal and orders.id_orders = detail_kursi.id_orders and kustomer.id_kustomer = orders.id_kustomer";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
$sqlNo="SELECT no_kursi from detail_kursi where id_orders='$r[id_orders]'";
$qNo=mysqli_query($koneksi,$sqlNo);
$count = mysqli_num_rows($qNo);
?>
              <table id="notNull" class="table table-bordered table-hover table-striped">
                <tbody>

          <tr>
						<td width="120px">Nama Kustomer</td>
						<td><?php echo$r['nama_lengkap'];?></td>
					</tr>
          <tr>
						<td>Nama Tiket</td>
						<td><?php echo $r['nama_tiket'];?></td>
					</tr>
					<tr>
						<td>Tujuan</td>
						<td><?php echo$r['tujuan'];?></td>
					</tr>
          <tr>
            <td>Jam</td>
            <td><?php echo$r['jam'];?></td>
          </tr>
          <tr>
            <td>Total</td>
            <td><?php echo$r['total'];?></td>
          </tr>
          <tr>
            <td>No Kursi</td>
            <td><?php
            $i = 0;
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
            <td>Bukti pembayaran</td>
            <td><?php 
            if($r['bukti_pembayaran'] == '' || $r['bukti_pembayaran'] == null){
                echo 'Bukti pembayaran kosong!';
            }else{
                 echo "<img src=\"../images/bukti_pembayaran/$r[bukti_pembayaran]\" height=150 />";
            }
            
            
            ?></td>
          </tr>
          <tr>
            <td colspan=2>
              <a class="btn btn-info" style="maxwidth:100%;" href="#" type="button" data-toggle="modal"  data-target="#confirm<?php echo $r['id_orders'];?>">Bukti &nbsp<i class="fa fa-credit-card "></i></a>
            <a href="?m=pesanan" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a>
            <?php
              if($r['status_orders'] != "Belum Lunas" && $r['status'] != "Belum Valid"){
                echo '<a class="btn btn-danger" disabled style="maxwidth:100%;" href="#" type="button" data-toggle="modal"  data-target="#confirm">Validasi &nbsp<i class="fa fa-credit-card "></i></a>';
              }else{
                echo '<a class="btn btn-success" style="maxwidth:100%;" href="#" type="button" data-toggle="modal"  data-target="#valid'.$r['id_pembayaran'].'">Validasi &nbsp<i class="fa fa-credit-card "></i></a>';
              }
             ?>
          </td>
          </tr>

                </tbody>
              </table>
			 </form>
       <div class="modal fade" id="confirm<?php echo $r['id_orders']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="?m=validasi_pembayaran&s=upload_bukti" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label for="bukti">Bukti Pembayaran</label>
                <input type="hidden" name="id_orders" value="<?php echo $r['id_orders'];?>">
                <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="<?php echo $r['id_pembayaran'];?>">
                <input type="file" required name="bukti_pembayaran" id="bukti" accept="image/*" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Tutup</button>
              <input type="submit" value="Simpan" name="simpan" class="btn btn-primary pull-right"/>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="valid<?php echo $r['id_pembayaran']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="?m=validasi_pembayaran&s=validasi_bayar" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Validasi Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id_pembayaran" value="<?php echo $r['id_pembayaran'];?>">
              <input type="hidden" name="id_orders" value="<?php echo $r['id_orders'];?>">
              <input type="hidden" name="id_tiket" value="<?php echo $r['id_tiket'];?>">
                <p>Apakah anda yakin ingin validasi pembayaran ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Tutup</button>
              <input type="submit" value="Simpan" name="simpan" class="btn btn-success pull-right"/>
            </div>
          </form>
        </div>
      </div>
    </div>
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
