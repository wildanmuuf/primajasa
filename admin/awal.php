<?php include "atas.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>Primajasa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fas fa-home"></i> Beranda</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
include_once "../sambungan.php";
$sql="SELECT count(id_petugas) as jumlah FROM petugas";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>petugas Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=petugas" class="small-box-footer">Info Petugas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_kelas) as jumlah FROM kelas";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Kelas Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=kelas" class="small-box-footer">Info Kelas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_tiket) as jumlah FROM tiket";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Tiket Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=bus" class="small-box-footer">Info Tiket <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /col-->

        <div class="col-lg-3 col-xs-6">
          <!-- small box-->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_jadwal) as jumlah FROM jadwal";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Jadwal Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=jadwal" class="small-box-footer">Info Jadwal <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box-->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_bank) as jumlah FROM bank";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Bank Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=bank" class="small-box-footer">Info Bank <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

</div>


        </div>
      <!-- /.page -->
<?php include "bawah.php"; ?>
