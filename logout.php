<?php
   session_start();
   unset($_SESSION['id_kustomer']);
   unset($_SESSION['nik']);

   echo "<script>alert('Anda berhasil keluar')</script>";
   echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>
