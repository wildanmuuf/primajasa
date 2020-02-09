<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Petugas";
switch($modul){
	//case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'riwayat_pesanan': default: $aktif="Riwayat Pesanan"; $judul="Riwayat Pesanan $jawal"; include "modul/riwayat_pesanan/index.php";break;
	case 'petugas': $aktif="Profil"; $judul="Profil $jawal"; include "modul/petugas/index.php"; break;
	case 'scan_qrcode': $aktif="Scan QRCode"; $judul="Scan QRCode $jawal"; include "modul/scan_qrcode/index.php"; break;
}

?>
