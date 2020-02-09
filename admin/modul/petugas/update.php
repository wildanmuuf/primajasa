<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id=$_POST['idpe'];
	$petugas=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama_petugas'];
	$jk		=$_POST['jk'];
	$hp		=$_POST['telpon'];
	$email	=$_POST['email'];
	$tanggall=$_POST['tgl_lahir'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	$level = $_POST['level'];
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE petugas SET username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$telpon', email='$email', tgl_lahir='$tanggall', level='$level' WHERE id_petugas='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE petugas SET username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$email', tgl_lahir='$tanggall', level='$level', foto='$namafile' WHERE id_petugas='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE petugas SET username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$email', tgl_lahir='$tanggall', level='$level', password='$sandi' WHERE id_petugas='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE petugas SET username='$petugas', nama_lengkap='$nama', jenis_kelamin='$jk', telpon='$hp', email='$email', tgl_lahir='$tanggall', level='$level', password='$sandi', foto='$namafile' WHERE id_petugas='$id'";
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
