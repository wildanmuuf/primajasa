<?php
if(empty($_SESSION['id_kustomer']) AND empty($_SESSION['nik'])){
	header('location:../login.php');
}
?>
