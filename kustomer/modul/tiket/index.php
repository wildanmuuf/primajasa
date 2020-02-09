<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/tiket/tampil.php"; break;
	case 'pemesanan': include "modul/tiket/pemesanan.php"; break;
	case 'simpan': include "modul/tiket/simpan.php"; break;
	case 'pilih_kursi': include "modul/tiket/pilih_kursi.php"; break;
	case 'simpan_kursi_tmp': include "modul/tiket/simpan_kursi_tmp.php"; break;
		// code...
		break;
}
?>
