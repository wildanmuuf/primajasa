<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/scan_qrcode/scan_qrcode.php"; break;
	case 'detail': include "modul/scan_qrcode/detail.php"; break;
	
		// code...
		break;
}
?>
