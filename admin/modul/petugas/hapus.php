<?php
if(isset($_GET['idpe'])){
	include "../sambungan.php";
	$id=$_GET['idpe'];
	$sql   = "DELETE FROM petugas WHERE id_petugas='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Petugas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=petugas");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Petugas gagal dihapus. Petugas masih digunakan dalam Rule")';
		echo '</script>';
		echo '<script>window.history.back()</script>';
	}
}
?>
