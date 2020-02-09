<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	
	$nik = $_SESSION['nik'];
	$metode_bayar=$_POST['metode'];
	$id_orders = $_POST['id_orders'];
    $tgl_lahir = substr($nik, 6, 4);
	$uid = substr($nik, 14, 2);
	$kode_nik = $tgl_lahir.$uid;
	$lokasi =$_FILES['bukti_pembayaran']['tmp_name'];
	$namafile=$_FILES['bukti_pembayaran']['name'];
	$tipefile=$_FILES['bukti_pembayaran']['type'];

	$query = "SELECT SUBSTRING(MAX(id_pembayaran),16,5) as maxKode FROM pembayaran where SUBSTRING(id_pembayaran,9,6)='$kode_nik'";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$count = (int) $data['maxKode'];
	$count++;
	$char = "B-PRMJS-";

	$kode = $char .$kode_nik."-". sprintf("%05s", $count);
	$id_bank = $_POST['nama_bank'];
    
	if(empty($lokasi)){
		$sql = "INSERT INTO pembayaran (id_pembayaran, metode_pembayaran, id_orders) VALUES ('$kode','$metode_bayar', '$id_orders')";
	}else{
		$folder="../images/bukti_pembayaran/";
		if (!file_exists($folder)){
		  mkdir($folder);
		}
		$ukuran=100;
		move_uploaded_file($lokasi, $folder.$namafile);
		$sql = "INSERT INTO pembayaran (id_pembayaran, metode_pembayaran, bukti_pembayaran, id_orders) VALUES ('$kode','$metode_bayar','$namafile', '$id_orders')";

	}

	$simpan=mysqli_query($koneksi,$sql);
	
	if($simpan){
		if($metode_bayar=="Ditempat"){
			header('Location:index.php?m=pembayaran&s=cetak_qrcode&ido='.$id_orders);
		}else if($metode_bayar=="Via Bank" && $id_bank != 0){
			$sql_detail = "INSERT INTO detail_pembayaran (id_pembayaran, id_bank) VALUES ('$kode','$id_bank')";
			$detail=mysqli_query($koneksi,$sql_detail);
				if($detail){
					header('Location:index.php?m=pembayaran&s=cetak_qrcode&ido='.$id_orders);
				}
		}else{
			header('Location:index.php?m=pembayaran');
		}
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
			//echo 'window.location.href="?m=kucing&s=tambah"';
		echo '</script>';
		
	}

}else{
	echo '<script>window.history.back()</script>';
}
?>
