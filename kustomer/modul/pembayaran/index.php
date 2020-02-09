<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/pembayaran/tampil.php"; break;
	case 'metode_pembayaran': include "modul/pembayaran/metode_pembayaran.php"; break;
	case 'simpan': include "modul/pembayaran/simpan.php"; break;
	case 'pilih_kursi': include "modul/pembayaran/pilih_kursi.php"; break;
	case 'simpan_kursi_tmp': include "modul/pembayaran/simpan_kursi_tmp.php"; break;
	case 'cetak_qrcode': include "modul/pembayaran/cetak_qrcode.php"; break;
	case 'pdf_qrcode': include "modul/pembayaran/pdf_qrcode.php"; break;
	case 'upload_bukti': include "modul/pembayaran/upload_bukti.php"; break;
		// code...
		break;
}
?>
