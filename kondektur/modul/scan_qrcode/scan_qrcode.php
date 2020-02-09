<?php include "atas.php";
include "../sambungan.php";
?>

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
        <li><i class="fa fa-qrcode"></i> Scan QRCode</a></li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Scan QRCode</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <center>
              <div id="QR-Code" class="container" style="max-width:100%">
                          <div class="panel-body">
                                  <div class="well" style="position: relative;display: inline-block;">
                                      <canvas class="img-responsive"></canvas>
                                      <input type="hidden" id="scanned-QR"/>
                                  </div>
                          </div>
                  </div>
                  </center>
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
    <script src="../fungsi/webcodecamjs/js/qrcodelib.js"></script>
   <script src="../fungsi/webcodecamjs/js/webcodecamjs.js"></script>
   <script src="../fungsi/webcodecamjs/js/main.js"></script>
    <script type="text/javascript">
    var arg = {
        beep: 'https://andrastoth.github.io/webcodecamjs/audio/beep.mp3',
        resultFunction: function(result) {
          var aChild = document.getElementById('scanned-QR'); 
            aChild.value = result.code; 
            window.location.href = "index.php?m=scan_qrcode&s=detail&ido="+result.code;
        }
      };
      new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
</script>
<?php include "bawah.php"; ?>
