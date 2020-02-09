<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/bank/tampil.php"; break;
	case 'tambah': include "modul/bank/tambah.php"; break;
	case 'simpan': include "modul/bank/simpan.php"; break;
	case 'edit': include "modul/bank/edit.php"; break;
	case 'update': include "modul/bank/update.php"; break;
	case 'hapus': include "modul/bank/hapus.php"; break;
	case 'detail': include "modul/bank/detail.php"; break;
	case 'profil': include "modul/bank/profil.php"; break;
}
?>
