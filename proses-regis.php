<?php
  include 'sambungan.php';

    //post to var
    $name = $_POST['nama'];
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $date_lahir = date_create($_POST['tgl_lahir']);
    $tgl_lahir = date_format($date_lahir,"Y-m-d");
    $jenis_kelamin = $_POST['jns_kelamin'];
    $valid = false;
    if(empty($name)){
      $valid = false;
    }
    // cek email dan username sudah ada
    $cekuser = mysqli_query($koneksi,"SELECT * FROM kustomer WHERE username = '$username' or email='$email' or nik='$nik'");
    if(mysqli_num_rows($cekuser)>0){
      echo "<script>alert('Username sudah ada')</script>";
      echo "<meta http-equiv='refresh' content='1 url=registrasi.php'>";
    }else{

      //sql statement
      $query = mysqli_query($koneksi,"INSERT INTO kustomer (nik, username, password, nama_lengkap, email, alamat, telpon, jenis_kelamin, tgl_lahir)
              VALUES ('$nik','$username', '$password', '$name', '$email', '$alamat', '$telepon', '$jenis_kelamin', '$tgl_lahir')");
      if($query){
            echo "<script>alert('Berhasil Mendaftar')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login.php'>";
      }else{
            echo "<script>alert('Gagal')</script>";
            echo("Error description: " . mysqli_error($koneksi));
      }
    }
 ?>
