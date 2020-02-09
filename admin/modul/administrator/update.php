<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$petugas=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$jabatan=$_POST['jabatan'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$hakakses=$_POST['hakakses'];
	$aktif	=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE petugas SET username='$petugas', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif' WHERE idpetugas='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE petugas SET username='$petugas', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile' WHERE idpetugas='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE petugas SET username='$petugas', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif' WHERE idpetugas='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE petugas SET username='$petugas', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile' WHERE idpetugas='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);	
	
	if($simpan){
		if($id==$_SESSION['idkasis']){
			//$_SESSION['idkasis'] 		= $b['idpetugas'];
			$_SESSION['userkasis'] 		= $petugas;
			$_SESSION['namakasis'] 		= $nama;
			$_SESSION['jabatankasis'] 	= $jabatan;
			$_SESSION['hakakseskasis'] 	= $hakakses;
			if(!empty($lokasi)){
				$_SESSION['fotokasis'] 	= $namafile;
			}
		}
		header('Location:index.php?m=admin&s=awal');
	}else{
		echo "gagal alias tidak berhasil";
		include "index.php?m=admin&s=awal";
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
