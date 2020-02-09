<?php
include_once "../sambungan.php";

$petugas = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM petugas WHERE username='$petugas' AND password='$pass' and level='kondektur'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['id_petugas'] 		= $b['id_petugas'];
	$_SESSION['user_kondektur']		= $b['username'];
	$_SESSION['nama_petugas']		= $b['nama_lengkap'];
	$_SESSION['email'] 	= $b['email'];
	if(!empty($b['foto'])){
		$_SESSION['foto'] = $b['foto'];
	}else{
		$_SESSION['foto'] = "default.png";
	}
	header('location: index.php?m=riwayat_pesanan');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
?>
