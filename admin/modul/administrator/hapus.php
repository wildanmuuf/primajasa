<?php
include "sesi.php";
if(isset($_GET['idp'])){
	include "../sambungan.php";
	$id=$_GET['idp'];
	$sql   = "SELECT * FROM petugas WHERE idpetugas='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../images/petugas/$foto");
		$sql1   = "DELETE FROM petugas WHERE idpetugas='$id'";
	}else{
		$sql1   = "DELETE FROM petugas WHERE idpetugas='$id'";
	}
		
	$hapus1 = mysqli_query($koneksi,$sql1);
	if($hapus1){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=admin");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
