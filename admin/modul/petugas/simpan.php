<?php
if(isset($_POST['simpan'])){
	require_once "../sambungan.php";
	require_once "../fungsi/upload.php";
	$name = $_POST['nama_petugas'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST["password"]);
	$telepon = $_POST['telepon'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jk'];
	$level = $_POST['level'];
	$alamat =$_POST['alamat'];
	$valid = false;

	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	if(empty($name)){
		$valid = false;
	}
	// cek email dan username sudah ada
	$cekuser = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username = '$username' or email='$email'");
	if(mysqli_num_rows($cekuser)>0){
		echo "<script>alert('Username sudah ada')</script>";
	}else{
		if(empty($lokasi)){
			$sql = "INSERT INTO petugas (id_petugas, username, password, nama_lengkap, email, telpon, jenis_kelamin,alamat, tgl_lahir, level)
							VALUES ('','$username', '$password', '$name', '$email', '$telepon', '$jenis_kelamin','$alamat', '$tgl_lahir','$level')";
		}else{
			$folder="../images/petugas/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql = "INSERT INTO petugas (id_petugas, username, password, nama_lengkap, email, telpon, jenis_kelamin,alamat, tgl_lahir, level, foto)
							VALUES ('','$username', '$password', '$name', '$email', '$telepon', '$jenis_kelamin','$alamat', '$tgl_lahir','$level', '$namafile')";
		}
		//sql statement
		$query = mysqli_query($koneksi,$sql);
		if($query){
			header('Location:index.php?m=petugas&s=awal');
		}else{
			echo '<script language="JavaScript">';
				echo 'alert("Data Gagal Ditambahkan.")';
				echo 'window.history.back()';
			echo '</script>';
		}
	}
}
?>
