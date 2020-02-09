<?php
if(isset($_POST['simpan'])){
	require_once "../sambungan.php";
	require_once "../fungsi/upload.php";
	$kode_bank = $_POST['kode_bank'];
	$nama_bank=$_POST['nama_bank'];
	$nama_penerima=$_POST['nama_penerima'];
	$no_rek = $_POST['no_rek'];
	$sql="SELECT * FROM bank WHERE kode_bank='$kode_bank'";
	$query=mysqli_query($koneksi,$sql);
	$ketemu=mysqli_num_rows($query);
	if($ketemu <= 0){
		$sql="INSERT INTO bank (kode_bank, nama_bank, nama_penerima,no_rekening) values ('$kode_bank', '$nama_bank', '$nama_penerima', '$no_rek')";
		$simpan=mysqli_query($koneksi,$sql);
		if($simpan){
			header('Location:index.php?m=bank');
		}else{
		    
		    echo mysqli_error($koneksi);
			echo '<script language="JavaScript">';
				echo 'alert("Data Gagal Ditambahkan.")';
			echo '</script>';
			//var_dump($sql);
		}
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data sudah ada.")';
		echo '</script>';
			echo '<script>window.history.back()</script>';
	}
	}else{
		echo '<script>window.history.back()</script>';
	}
?>
