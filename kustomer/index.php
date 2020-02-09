<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Kustomer";
switch($modul){
	case 'tiket': default: $aktif="Tiket"; $judul="Pemesanan Tiket $jawal"; include "modul/tiket/index.php"; break;
	case 'riwayat_pesanan': $aktif="Riwayat Pesanan"; $judul="Riwayat Pesanan $jawal"; include "modul/riwayat_pesanan/index.php";break;
	case 'kustomer': $aktif="kustomer"; $judul="Profil $jawal"; include "modul/kustomer/index.php"; break;
	case 'pembayaran': $aktif="Pembayaran"; $judul="Pembayaran $jawal"; include "modul/pembayaran/index.php"; break;
}

?>
