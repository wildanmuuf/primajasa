<?php
   session_start();
   unset($_SESSION['id_petugas']);
   unset($_SESSION['user_kondektur']);

   echo "<script>alert('Anda berhasil keluar')</script>";
   echo "<script>window.location='login.php'</script>";
?>
