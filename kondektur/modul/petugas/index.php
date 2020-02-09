<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/petugas/profil.php"; break;
	case 'edit': include "modul/petugas/edit.php"; break;
	case 'update': include "modul/petugas/update.php"; break;
	case 'profil': include "modul/petugas/profil.php"; break;
}
?>
