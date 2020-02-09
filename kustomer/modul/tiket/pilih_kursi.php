<?php include "atas.php";
$id=$_GET['idt'];
$tgl=$_GET['tgl'];
$nik = $_SESSION['nik'];
$id_kustomer = $_SESSION['id_kustomer'];
$query = "SELECT SUBSTRING(MAX(id_orders),14,5) as maxKode FROM orders  where id_kustomer = '$id_kustomer'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$count = (int) $data['maxKode'];

$count++;
$char = "PRMJS-";
$tgl_lahir = substr($nik, 6, 4);
$uid = substr($nik, 14, 2);
$kode_nik = $tgl_lahir.$uid;
$kode = $char .$kode_nik."-". sprintf("%05s", $count);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemesanan Tiket
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=tiket"><i class="fa fa-ticket-alt"></i> Tiket</a></li>
        <li class="active">Pilih Kursi</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Kursi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" enctype="multipart/form-data">
                  <input type="text" id="id_tiket" value="<?php echo $id?>" hidden/>
                  <input type="text" id="id_orders" value="<?php echo $kode?>" hidden/>
                  
                  <div class="col-md-5">
                      <table style="border:1px solid black;">
                          <tbody>
                              <tr>
                                  <td><p style="font-size:15px; padding-left:8px;">Keterangan</p></td>
                                  <td></td>
                              </tr>
                              <tr>
                                  <td style="padding-left:8px;"><p style="font-size:10px;">Kursi Kosong</p></td>
                                  <td style="padding-right:8px; padding-top:3px;"><img src="../images/kursi.png"  height=27></td>
                              </tr>
                              <tr>
                                  <td style="padding-left:8px;"><p style="font-size:10px;">Kursi Dipilih</p></td>
                                  <td style="padding-right:8px;"><img src="../images/kursi-picked.png"  height=27></td></td>
                              </tr>
                              <tr>
                                  <td width="120px" style="padding-left:8px;"><p style="font-size:10px;">Kursi Telah Dipesan</p></td>
                                  <td style="padding-right:8px; padding-bottom:5px;""><img src="../images/kursi-disabled.png"  height=27></td></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <br>
                <center>
          <?php
            include "../sambungan.php";
            $sql="SELECT tiket.*, kelas.jumlah_kursi, kelas.tipe_kursi FROM tiket, kelas WHERE kelas.id_kelas=tiket.id_kelas and tiket.id_tiket='$id'";
            $query=mysqli_query($koneksi,$sql);
            $r=mysqli_fetch_assoc($query);
            $jumlah_kursi = (int) $r['jumlah_kursi'] + 1;
            $sql1="SELECT detail_kursi.no_kursi, orders.tgl_berangkat FROM  detail_kursi, orders WHERE detail_kursi.id_tiket='$id' and orders.id_orders = detail_kursi.id_orders and orders.tgl_berangkat = '$tgl'";
            $query1=mysqli_query($koneksi,$sql1);
            $r1=mysqli_fetch_assoc($query1);
            for($i=1; $i < $jumlah_kursi; $i++){
              $no_kursi = $i;
              if(mysqli_num_rows($query1)== 0){
                $sql3="SELECT detail_kursi_temp.no_kursi_temp FROM  detail_kursi_temp WHERE detail_kursi_temp.no_kursi_temp='$no_kursi' and detail_kursi_temp.id_orders_temp='$kode' and detail_kursi_temp.id_tiket_temp='$id'";
                $query3=mysqli_query($koneksi,$sql3);
                if(mysqli_num_rows($query3)>0){
                  echo '<div id="kursi-'.$no_kursi.'" class="picked">
                          <center>
                              <span class="text">'.$no_kursi.'</span>
                              <input type="button" id="no_kursi'.$no_kursi.'" onclick = "pesan('.$no_kursi.'); handleClick('.$no_kursi.');"/>
                          </center>
                        </div>';
                }else{
                  //echo '<button type="button" id="no_kursi'.$no_kursi.'" class="btTxt submit" onclick = "pesan('.$no_kursi.'); handleClick('.$no_kursi.');"><i class="fa fa-check"></i>'.$no_kursi.'</button>';
                  echo '<div id="kursi-'.$no_kursi.'" class="available">
                          <center>
                              <span class="text">'.$no_kursi.'</span>
                              <input type="button" id="no_kursi'.$no_kursi.'" onclick = "pesan('.$no_kursi.'); handleClick('.$no_kursi.');"/>
                          </center>
                        </div>';
                }
              }else{
                  $sql2="SELECT detail_kursi.no_kursi FROM  detail_kursi WHERE detail_kursi.no_kursi='$no_kursi' and detail_kursi.id_tiket='$id'";
                  $query2=mysqli_query($koneksi,$sql2);
                  if(mysqli_num_rows($query2)>0){
                    echo '<div id="kursi-'.$no_kursi.'" class="disable">
                          <center>
                              <span class="text">'.$no_kursi.'</span>
                              <input type="button" id="no_kursi'.$no_kursi.'" onclick = "pesan('.$no_kursi.'); handleClick('.$no_kursi.');" disabled />
                          </center>
                        </div>';
                  }else{
                    $sql3="SELECT detail_kursi_temp.no_kursi_temp FROM  detail_kursi_temp WHERE detail_kursi_temp.no_kursi_temp='$no_kursi' and detail_kursi_temp.id_orders_temp='$kode' and detail_kursi_temp.id_tiket_temp='$id'";
                    $query3=mysqli_query($koneksi,$sql3);
                    if(mysqli_num_rows($query3)>0){
                      echo '<div id="kursi-'.$no_kursi.'" class="picked">
                          <center>
                              <span class="text">'.$no_kursi.'</span>
                              <input type="button" id="no_kursi'.$no_kursi.'" onclick = "pesan('.$no_kursi.'); handleClick('.$no_kursi.');"/>
                          </center>
                        </div>';
                    }else{
                      echo '<div id="kursi-'.$no_kursi.'" class="available">
                          <center>
                              <span class="text">'.$no_kursi.'</span>
                              <input type="button" id="no_kursi'.$no_kursi.'" onclick = "pesan('.$no_kursi.'); handleClick('.$no_kursi.');"/>
                          </center>
                        </div>';
                    }
                }
              }
              if($r['tipe_kursi']=="2-2"){
                if($i % 2 == 0 && $i < 53){
                  echo "&nbsp;&nbsp;&nbsp;&nbsp";
                }
                if($i % 2 <= 2){
                  echo "&nbsp;&nbsp";
                }
                if ($i % 4 == 0) {
                  echo "<br><br>";
                }
              }else{
                if($i % 5 == 3 && $i < 55){
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                if($i % 5 <= 4){
                  echo "&nbsp;&nbsp";
                }
                if ($i % 5 == 0) {
                  echo "<br><br>";
                }
              }

            }
          ?>
        </center>
            <br><br>
						<a href="?m=tiket&s=pemesanan&ido=<?php echo $kode;?>&idt=<?php echo $id;?>&tgl=<?php echo $tgl;?>" style="width:120px;" class="btn btn-large btn-success"><i class="fa fa-check"></i> Selanjutnya</a>&nbsp;&nbsp;&nbsp;
						<a href="?m=tiket" style="width:100px;" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Batal</a>
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
    function handleClick(no_kursi){
      var element = document.getElementById("kursi-"+no_kursi);
      if (element.classList.contains("available")) {
          element.classList.remove("available");
           element.classList.add("picked");
      }else{
          element.classList.remove("picked");
           element.classList.add("available");
      }
    }

    var pesan = function (no_kursi){
               var id_tiket = document.getElementById('id_tiket').value;
               var id_orders = document.getElementById('id_orders').value;
               var formData = {id_orders:id_orders, no_kursi:no_kursi, id_tiket:id_tiket};
               $.ajax({
                   url : "modul/tiket/simpan_kursi_tmp.php",
                   type: "POST",
                   data : formData,
                   success: function(data, textStatus, jqXHR)
                   {
                       console.log(data);
                   },
                   error: function (jqXHR, textStatus, errorThrown)
                   {
                     console.log(jqXHR.responseText);
                   }
               });
             }

    </script>
<?php include "bawah.php"; ?>
