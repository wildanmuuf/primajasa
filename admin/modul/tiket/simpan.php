<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$id_tiket	=$_POST['tiket'];
	$nama_tiket	=$_POST['nama_tiket'];
	$id_jadwal = $_POST['jadwal'];
	$id_kelas = $_POST['kelas'];
	$id_petugas = $_POST['kondektur'];
	$harga_tiket = $_POST['harga_tiket'];
	$sql="INSERT INTO tiket SET id_tiket='$id_tiket', nama_tiket='$nama_tiket', id_jadwal='$id_jadwal', id_kelas='$id_kelas', harga_tiket='$harga_tiket', id_petugas='$id_petugas'";
	$simpan=mysqli_query($koneksi,$sql);

	if($simpan){
		header('Location:index.php?m=tiket&s=awal');
	}else{
		echo("Error description: " . mysqli_error($koneksi));
		include "index.php?m=tiket&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
