<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id_orders = $_POST['id_orders'];
	$id_kostumer = $_SESSION['id_kustomer'];
	$tgl_berangkat = $_POST['tgl_berangkat'];
	$total = $_POST['total'];
	$tgl = date("Y-m-d");
	$jam = date("H:i");
	$sql="INSERT INTO orders (id_orders, tgl_berangkat, tgl_order, jam_order, id_kustomer, total) VALUES ('$id_orders', '$tgl_berangkat', '$tgl', '$jam','$id_kostumer', '$total')";
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		$lihat = "SELECT*from detail_kursi_temp where id_orders_temp='$id_orders'";
		$check = mysqli_query($koneksi, $lihat);
		while($rCheck = mysqli_fetch_array($check)){
			$sql_detail = "INSERT INTO detail_kursi (id_orders, id_tiket, no_kursi) VALUES ('$id_orders','$rCheck[id_tiket_temp]','$rCheck[no_kursi_temp]')";
			mysqli_query($koneksi,$sql_detail);
		}
		$sql_hapus = "DELETE from detail_kursi_temp where id_orders_temp='$id_orders'";
		mysqli_query($koneksi,$sql_hapus);
		
		header('Location:index.php?m=pembayaran&s=metode_pembayaran&ido='.$id_orders);
	}else{
		echo("Error description: " . mysqli_error($koneksi));
		include "index.php?m=tiket&s=pemesanan";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
