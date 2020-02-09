<!DOCTYPE HTML>
<html>
<?php error_reporting(0);?>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Primajasa</title>
	<link rel="shortcut icon" href="images/2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
					<img src="images/2.png" height="100px" /><div id="colorlib-logo"><a href="index.php">NAMA APLIKASINYA</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li class="active"><a href="index.php">Beranda</a></li>
								<li class="has-dropdown">
									<a href="">Login</a>
									<ul class="dropdown">
										<li><a href="kustomer/login.php">Login kustomer</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<section id="home" class="video-hero" style="height: 700px; background-image: url(images/bg-banner.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
		<div class="overlay"></div>
			<!--<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=vqqt5p0q-eU',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a>-->
			<div class="display-t text-center">
				<div class="display-tc">
					<div class="container">
						<div class="col-md-12 col-md-offset-0">
							<div class="animate-box">
								<p><h2>Primajasa</h2></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="colorlib-featured">
			<div class="row animate-box">
				<div class="featured-wrap">
					<div class="owl-carousel">
						<div class="item">
							<div class="col-md-8 col-md-offset-2">
								<div class="featured-entry">
									<img class="img-responsive" src="images/2.png" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-md-8 col-md-offset-2">
								<div class="featured-entry">
									<img class="img-responsive" src="images/4.jpg" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-md-8 col-md-offset-2">
								<div class="featured-entry">
									<img class="img-responsive" src="images/03.jpg" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<center><h1>TIPS KUCING</h1></center>
<?php
include_once "sambungan.php";
$sqljs="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
$queryjs=mysqli_query($koneksi,$sqljs);
$rjs=mysqli_fetch_array($queryjs);
?>
<?php
$sql="SELECT*FROM kandidat ORDER BY nokandidat";
$query=mysqli_query($koneksi,$sql);
while ($r = mysqli_fetch_assoc($query)) {
?><a href="#" data-toggle="modal" data-target="#detail<?php echo $r['nokandidat'];?>">
	<div class="col-md-6 text-justify col-sm-6" id="text-about-left">
		<center><h3>Ini judul tips kucingnya</h3>
		<img src="images/kandidat/<?php echo $r['foto']; ?>" class="img-circle" height="150px" id="img-about <?php echo $r['nokandidat'];?>">
		<hr>
		<p>ini isi tips kucingnya, tapi gk sepenuhnya, yang sepenuhnya di dalem modal</p><br>
		</center>
	</div>
 </a>
 <div id="detail<?php echo $r['nokandidat']; ?>" class="modal fade" role="dialog">
	 <div class="modal-dialog" role="document">
	 	<div class="col-md-9">
			<center>
	 		<div class="modal-content">
	 			<div class="modal-header">
					<h3>Judul Tips Kucing</h3>
	 			</div>
				<div class="modal-body">
					<div class="row">
						<h4> Kelas Dalam Tips Ini </h4>
								<p>Penjelasan penuh soal tips kucingnya</p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
	 		</div>
		</center>
	 	</div>
	 </div>
 </div>
<?php
}
?>
				</div>

		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About SMA Triguna Utama</h4>
						<p>Menurut sejarahnya SMA Triguna Utama merupakan salah satu Sekolah Menengah Atas yang ada di wilayah Kota Tangerang Selatan yang terletak di Jl. Ir. H. Juanda No. 147, RT.2 / RW.4, Cempaka Putih, Ciputat Timur, Kota Tangerang Selatan, Banten 15412 yang terletak sekitar 8 km dari pusat Pemerintahan Kota Tangerang Selatan. SMA Triguna Utama berdiri di bawah naungan Yayasan Pendidikan Islam Triguna Utama ( YAPITU ) pada tahun 1982 Dari Kepala Dinas Pendidikan dan Kebudayaan Wilayah Banten.
						Gedung Sekolah SMA Triguna Utama terdiri dari 5 ruang kelas sebanyak 2 lantai untuk belajar siswa, 1 ruang guru, 1 ruang kepala sekolah dan 1 ruang lab komputer.</p>
						<p>

						</p>
					</div>
					<div class="col-md-3 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="index.php"><i class="icon-check"></i> Home</a></li>

								<li><a href="kustomer/login.php"><i class="icon-check"></i>Login kustomer</a></li>

							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Recent Blog</h4>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/2.png);">
							</a>
							<div class="desc">
								<h2><a href="http://www.triguna-utama.sch.id/">SMA Triguna Utama</a></h2>
								<p class="admin"><span>24 Juni 2019</span></p>
							</div>
						</div>

						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/2.png);">
							</a>
							<div class="desc">
								<h2><a href="">Lembaga Sertifikasi Profesi</a></h2>
								<p class="admin"><span>24 Juni 2019</span></p>
							</div>
						</div>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Contact Info</h4>
						<ul class="colorlib-footer-links">
							<li>Jalan. Ir. H.Juanda KM.2, <br> Ciputat Timur,<br>Tangerang Selatan 15412</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> (021) 7401100</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
							<li><a href="#"><i class="icon-location4"></i>www.triguna-utama.sch.id</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								 <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- YTPlayer -->
	<script src="js/jquery.mb.YTPlayer.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
