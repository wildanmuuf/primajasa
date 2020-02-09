<?php
include_once "sambungan.php";
include "header.php";
?>
<?php
$nama="";
$id_user ="";
if(!empty($_SESSION['id_kustomer'])){
  $id_user = $_SESSION['id_kustomer'];
  $sql="SELECT * FROM kustomer where id_kustomer='$id_user'";
  $query=mysqli_query($koneksi,$sql);
  $r=mysqli_fetch_array($query);
  $nama = $r['nama_lengkap'];
}
?>

  <title>Sistem Pemesanan Tiket</title>
</head>
<body>
<div class= "wrap">
  <div class="header pb-5">
        <div class="container-fluid mt-1">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 mx-auto main-title">
                        <p class="welcome-text text-center mx-auto mt-5" >Selamat Datang <?php echo $nama ?> di PRIMAJASA</p>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                    <div class="col-sm-2"></div>
                </div>

        </div>
    </div>

    
    <?php
    include "footer.php";
    ?>
