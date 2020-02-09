<?php
if(isset($_POST['simpan'])){
	require_once "../sambungan.php";
	require_once "../fungsi/upload.php";
	$id = $_POST['id_jadwal'];
	$tujuan=$_POST['tujuan'];
	$jam = $_POST['jam'];
	$sql="SELECT * FROM jadwal WHERE tujuan='$tujuan'";
	$query=mysqli_query($koneksi,$sql);
	$ketemu=mysqli_num_rows($query);
	if($ketemu <= 0){
		$sql="INSERT INTO jadwal SET id_jadwal = '$id', jam='$jam', tujuan='$tujuan'";
		$simpan=mysqli_query($koneksi,$sql);
		if($simpan){
			header('Location:index.php?m=jadwal');
		}else{
			include "index.php?m=jadwal";
			echo '<script language="JavaScript">';
				echo 'alert("Data Gagal Ditambahkan.")';
			echo '</script>';
			//var_dump($sql);
		}
		}else{
			echo '<script language="JavaScript">';
				echo 'alert("Data sudah ada.")';
			echo '</script>';
				echo '<script>window.history.back()</script>';
		}
	}else{
		echo '<script>window.history.back()</script>';
	}
?>
