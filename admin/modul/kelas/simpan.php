<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$nama_kelas	=$_POST['nama_kelas'];
	$jumlah_kursi	=$_POST['jumlah_kursi'];
	$tipe_kursi = $_POST['tipe_kursi'];
	$query = "SELECT MAX(id_kelas) as maxKode FROM kelas ";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kode_kelas = $data['maxKode'];

	$sql_count = "SELECT* FROM kelas ";
	$count_query = mysqli_query($koneksi,$sql_count);
	$count = mysqli_num_rows($count_query);
	$noUrut=0;
	if($count<10 || $count == 0){
		$noUrut = (int) substr($kode_kelas, 3, 3);
	}else if($count<99){
		$noUrut = (int) substr($kode_kelas, 2, 3);
	}else{
		$noUrut = (int) substr($kode_kelas, 1, 3);
	}

	$noUrut++;
	$char = "K";
	$kode = $char . sprintf("%03s", $noUrut);
	$sql="INSERT INTO kelas SET id_kelas='$kode', nama_kelas='$nama_kelas', jumlah_kursi='$jumlah_kursi', tipe_kursi='$tipe_kursi'";
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kelas&s=awal');
		//echo "berhasil";
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
			echo 'window.history.back()';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
