<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/riwayat_pesanan/tampil.php"; break;
	case 'pemesanan': include "modul/riwayat_pesanan/pemesanan.php"; break;
	case 'simpan': include "modul/riwayat_pesanan/simpan.php"; break;
	case 'pesanan': include "modul/riwayat_pesanan/riwayat_pesanan.php"; break;
	case 'upload_bukti': include "modul/riwayat_pesanan/upload_bukti.php"; break;
	case 'validasi_bayar': include "modul/riwayat_pesanan/validasi_bayar.php"; break;

		// code...
		break;
}
?>
