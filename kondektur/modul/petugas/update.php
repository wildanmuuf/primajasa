<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id=$_POST['id'];
	$nik=$_POST['nik'];
	$petugas=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama_lengkap'];
	$jk		=$_POST['jk'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$tanggall=$_POST['tanggal'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE petugas SET nik='$nik', username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$surel', tgl_lahir='$tanggall' WHERE id_petugas='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE petugas SET nik='$nik', username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$surel', tgl_lahir='$tanggall', foto='$namafile' WHERE id_petugas='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE petugas SET nik='$nik', username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$surel', tgl_lahir='$tanggall', password='$sandi' WHERE id_petugas='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE petugas SET nik='$nik', username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$surel', tgl_lahir='$tanggall', password='$sandi', foto='$namafile' WHERE id_petugas='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=petugas');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		echo("Error description: " . mysqli_error($koneksi));
		include "index.php?m=petugas&s=awal";
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
