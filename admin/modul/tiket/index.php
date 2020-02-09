<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/tiket/tampil.php"; break;
	case 'tambah': include "modul/tiket/tambah.php"; break;
	case 'simpan': include "modul/tiket/simpan.php"; break;
	case 'edit': include "modul/tiket/edit.php"; break;
	case 'update': include "modul/tiket/update.php"; break;
	case 'hapus': include "modul/tiket/hapus.php"; break;
	case 'detail': include "modul/tiket/detail.php"; break;
	case 'profil': include "modul/tiket/profil.php"; break;
}
?>
