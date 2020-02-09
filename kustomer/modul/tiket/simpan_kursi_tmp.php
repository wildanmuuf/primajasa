<?php
	include $_SERVER['DOCUMENT_ROOT']."/sambungan.php";
	$no_kursi = $_POST['no_kursi'];
	$id_tiket = $_POST['id_tiket'];
	$id_orders = $_POST['id_orders'];

	$sqlCari="SELECT no_kursi_temp FROM  detail_kursi_temp WHERE id_orders_temp = '$id_orders' and id_tiket_temp='$id_tiket' and no_kursi_temp = '$no_kursi'";
	$cari=mysqli_query($koneksi,$sqlCari);
	if(mysqli_num_rows($cari)==0){
		$insert		 = "INSERT INTO detail_kursi_temp (id_orders_temp, id_tiket_temp, no_kursi_temp) VALUES ('$id_orders','$id_tiket','$no_kursi')";
		mysqli_query($koneksi, $insert);
	}else{
		$delete = "DELETE from detail_kursi_temp where id_orders_temp = '$id_orders' and id_tiket_temp='$id_tiket' and no_kursi_temp = '$no_kursi'";
		mysqli_query($koneksi, $delete);
	}

?>
