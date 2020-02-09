<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/petugas/tampil.php"; break;
	case 'tambah': include "modul/petugas/tambah.php"; break;
	case 'simpan': include "modul/petugas/simpan.php"; break;
	case 'edit': include "modul/petugas/edit.php"; break;
	case 'update': include "modul/petugas/update.php"; break;
	case 'hapus': include "modul/petugas/hapus.php"; break;
	case 'detail': include "modul/petugas/detail.php"; break;
	case 'profil': include "modul/petugas/profil.php"; break;
}
?>
