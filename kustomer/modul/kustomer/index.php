<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/kustomer/profil.php"; break;
	case 'edit': include "modul/kustomer/edit.php"; break;
	case 'update': include "modul/kustomer/update.php"; break;
	case 'profil': include "modul/kustomer/profil.php"; break;
}
?>
