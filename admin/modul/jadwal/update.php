<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['idj'];
	$tujuan=$_POST['tujuan'];
	$jam = $_POST['jam'];
	$sql="UPDATE jadwal SET tujuan='$tujuan', jam='$jam' where id_jadwal='$id'";

	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=jadwal&s=awal');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil, kemungkinan username sudah digunakan";
		include "index.php?m=jadwal&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
