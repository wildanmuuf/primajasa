<?php
if(isset($_GET['idj'])){
	include "../sambungan.php";
	$id=$_GET['idj'];
	$sql   = "DELETE FROM jadwal WHERE id_jadwal='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=jadwal");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Jadwal gagal dihapus. Jadwal masih digunakan dalam Rule")';
		echo '</script>';
		echo '<script>window.history.back()</script>';
	}
}
?>
