<?php
require('../fungsi/fpdf/fpdf.php');
include "atas.php";
include "../sambungan.php";
include "../fungsi/phpqrcode/qrlib.php";
$qrdir = "../images/qrcode/";
$ido = $_GET['ido'];
if (!file_exists($qrdir)){
  mkdir($qrdir);
}

$namafile = $ido.".png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 10; //batasan 1 paling kecil, 10 paling besar
$padding = 5;

QRCode::png($ido,$qrdir.$namafile,$quality,$ukuran,$padding);

 ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         Pembayaran
         <small>Primajasa</small>
       </h1>
       <ol class="breadcrumb">
         <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
         <li><a href="?m=tiket"><i class="fa fa-book"></i> Tiket</a></li>
         <li class="active">Cetak QRCode</li>
       </ol>
     </section>
     <!-- Main content -->
 	<section class="content">
       <div class="row">
         <div class="col-xs-12">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Cetak QRCode</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <form method="post" enctype="multipart/form-data">
                 <center>
                   <?php echo '<img class="img-fluid img-thumbnail" src="../images/qrcode/'.$ido.'.png"/><br><br>';
                    echo 'Kode Transaksi : <b>'.$ido.'</b>&nbsp; <a type="button" href="?m=pembayaran&s=pdf_qrcode&ido='.$ido.'" class="btn btn-primary">Cetak PDF</a><br><br>';
                   ?>
                  <div class="panel panel-default" style="max-width:700px;">
                    <div class="panel-body" >
                      <h4>Tunjukan QRCode ini pada petugas bus setelah Anda memasuki bus. <br>
                      Terimakasih sudah menggunakan jasa kami. Semoga sampai ke tujuan Anda dengan selamat.</h4>
                    </div>
                  </div>
                 </center>

             <br><br>
 						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?m=pembayaran" style="width:100px;" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a>
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
