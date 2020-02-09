<?php
if(empty($_SESSION['id_petugas']) AND empty($_SESSION['user_kondektur'])){
	header('location:login.php');
}
?>
