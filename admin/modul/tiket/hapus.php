<?php
if(isset($_GET['idt'])){
	include "../sambungan.php";
	$id=$_GET['idt'];
	$sql   = "DELETE FROM tiket WHERE id_tiket='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location:?m=tiket");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data tiket gagal dihapus.")';
		echo '</script>';
		echo '<script>window.history.back()</script>';
	}
}
?>
