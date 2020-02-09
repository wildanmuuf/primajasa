<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Administrator";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'petugas': $aktif="Petugas"; $judul="Modul Daftar Petugas $jawal"; include "modul/petugas/index.php"; break;
	case 'kelas': $aktif="Kelas"; $judul="Modul Kelola Kelas $jawal"; include "modul/kelas/index.php"; break;
	case 'tiket': $aktif="Tiket"; $judul="Modul Kelola Tiket $jawal"; include "modul/tiket/index.php"; break;
	case 'jadwal': $aktif="Jadwal"; $judul="Modul Kelola Jadwal $jawal"; include "modul/jadwal/index.php"; break;
	case 'bank': $aktif="Bank"; $judul="Modul Kelola Bank $jawal"; include "modul/bank/index.php"; break;
}

?>
