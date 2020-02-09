<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id = $_POST['id_tiket'];
	$nama_tiket	=$_POST['nama_tiket'];
	$id_jadwal = $_POST['jadwal'];
	$id_kelas = $_POST['kelas'];
	$harga_tiket =$_POST['harga_tiket'];
	$id_petugas = $_POST['kondektur'];
	$sql="UPDATE tiket SET nama_tiket='$nama_tiket', id_jadwal='$id_jadwal', id_kelas='$id_kelas', harga_tiket='$harga_tiket', id_petugas='$id_petugas' WHERE id_tiket='$id'";
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=tiket');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?s=awal";
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
