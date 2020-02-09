<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['idb'];
	$kode_bank = $_POST['kode_bank'];
	$nama_bank=$_POST['nama_bank'];
	$nama_penerima=$_POST['nama_penerima'];
	$no_rek = $_POST['no_rek'];
	$sql="UPDATE bank SET kode_bank='$kode_bank', nama_bank='$nama_bank', nama_penerima='$nama_penerima',no_rekening='$no_rek' where id_bank='$id'";

	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=bank&s=awal');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil, kemungkinan username sudah digunakan";
		include "index.php?m=bank&s=awal";
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
