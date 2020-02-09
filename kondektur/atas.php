<!DOCTYPE html>
<?php
  include_once "../sambungan.php";
  $id_user = $_SESSION["id_petugas"];
  $sql="SELECT * FROM petugas where id_petugas='$id_user'";
  $query=mysqli_query($koneksi,$sql);
  $r=mysqli_fetch_array($query);
  if(empty($r['foto'])){
    $r['foto'] = "default.png";
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul;?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- favicon -->
    <link rel="shortcut icon" href="../images/icon/icon.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/ -->
    <link rel="stylesheet" href="../css/fontawesome-5.11.2/css/all.css">
    <!-- Ionicons https://code.ionicframework.com/ionicons/2.0.1/ -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../css/dist/css/skins/skin-custom-pengguna.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" type="text/css" href="plugins/datepicker/dist/datepicker3.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables-2/dataTables.min.css">
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="plugins/jQueryUI/jQuery-ui.min.js"></script>
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-custom_pengguna sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="." class="logo">
          <span class="logo-mini"><b>P</b>RM</span>

          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PRIMAJASA </b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <img src="../images/petugas/<?php echo $r['foto']; ?>" class="user-image" alt="<?php echo $r['username']; ?>">
                  <small><?php echo $r['nama_lengkap']; ?></small>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/petugas/<?php echo $r['foto']; ?>" class="img-circle" alt="<?php echo $r['nama_lengkap']; ?>">
                    <p>
                      <?php echo $r['nama_lengkap']; ?>
                      <small><?php echo $r['email']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?m=petugas&s=profil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/petugas/<?php echo $r['foto']; ?>" class="img-circle" alt="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="pull-left info">
              <p><?php echo $r['nama_lengkap']; ?></p>
              <a href="?m=petugas&s=profil"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="<?php if($aktif=='Profil') echo 'active';?> treeview">
              <a href="?m=petugas&a=profil">
                <i class="fa fa-user"></i> <span>Profil</span>
              </a>
            </li>
            <li class="<?php if($aktif=='Riwayat Pesanan') echo 'active';?> treeview">
              <a href="?m=riwayat_pesanan">
                <i class="fa fa-money-bill-alt"></i> <span>Riwayat Pesanan</span>
              </a>
            </li>
            <li class="<?php if($aktif=='Scan QRCode') echo 'active';?> treeview">
              <a href="?m=scan_qrcode">
                <i class="fa fa-qrcode"></i> <span>Scan QRCode</span>
              </a>
            </li>

            <li>
              <a href="logout.php">
                <i class="fa fa-sign-out-alt"></i> <span>Logout</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
