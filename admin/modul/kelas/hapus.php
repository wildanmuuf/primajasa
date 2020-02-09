<?php
if(isset($_GET['idk'])){
	include "../sambungan.php";
	$id=$_GET['idk'];
	$sql   = "SELECT * FROM kelas WHERE id_kelas='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);


	$sqlTiket = "SELECT*from bus where id_kelas='$id'";
	$qTiket = mysqli_query	($koneksi,$sqlTiket);

	if(mysqli_num_rows($qTiket)>0){
		while($rTiket=mysqli_fetch_array($qTiket)){

			$sqlNullKelas="UPDATE bus SET id_kelas=NULL where id_bus='$rTiket[id_kucing]'";
			var_dump($sqlNullKelas);
			mysqli_query($koneksi,$sqlNullKelas);
		}
	}
	$sql   = "DELETE FROM kelas WHERE id_kelas='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location:?m=kelas");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Kelas Gagal dihapus.")';
							echo '</script>';
		//echo '<script>window.history.back()</script>';
	}

}
?>
