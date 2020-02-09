<?php
if(isset($_GET['idb'])){
	include "../sambungan.php";
	$id=$_GET['idb'];
	$sql   = "DELETE FROM bank WHERE id_bank='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=bank");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Bank gagal dihapus. Bank masih digunakan dalam Rule")';
		echo '</script>';
		echo '<script>window.history.back()</script>';
	}
}
?>
