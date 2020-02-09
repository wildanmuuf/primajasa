<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id = $_POST['id_kelas'];
	$nama_kelas	=$_POST['nama_kelas'];
	$jumlah_kursi	=$_POST['jumlah_kursi'];
	$tipe_kursi = $_POST['tipe_kursi'];
	$sql="UPDATE kelas SET nama_kelas='$nama_kelas', jumlah_kursi='$jumlah_kursi', tipe_kursi='$tipe_kursi' WHERE id_kelas='$id'";
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kelas');
	}else{
		include "index.php?m=kelas&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
			echo("Error description: " . mysqli_error($koneksi));
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
