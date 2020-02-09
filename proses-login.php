<?php
include_once "sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM kustomer WHERE (username='$user' or email='$user') AND password='$pass'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['id_kustomer'] 	= $b['id_kustomer'];
	$_SESSION['nik']		= $b['nik'];
	header('location: kustomer/index.php?m=tiket');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah")';
	echo '</script>';
}
?>
