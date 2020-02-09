<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/riwayat_pesanan/tampil.php"; break;
	case 'detail': include "modul/riwayat_pesanan/detail.php"; break;
}
?>
