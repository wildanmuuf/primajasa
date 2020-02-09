<!DOCTYPE html>
<?php
  include_once "../sambungan.php";
  $id_user = $_SESSION["id_admin"];
  $sql="SELECT * FROM petugas where id_petugas='$id_user' and level='admin'";
  $query=mysqli_query($koneksi,$sql);
  $r=mysqli_fetch_array($query);
  if(empty($r['foto'])){
    $r['foto'] = "default-admin.png";
  }
?>
<html lang="en">
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
    <link rel="stylesheet" type="text/css" href="plugins/clockpicker/dist/jquery-clockpicker.min.css">

    <!-- Font Awesome https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/ -->
    <link rel="stylesheet" href="../css/fontawesome-5.11.2/css/all.css">
    <!-- Ionicons https://code.ionicframework.com/ionicons/2.0.1/ -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../css/dist/css/skins/skin-blue.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="plugins/tinymce/js/tinymce/tinymce.min.js"></script>
    <!-- panggil ckeditor.js -->
    <link rel="stylesheet" type="text/css" href="plugins/datatables-2/dataTables.min.css">

    <style media="screen">
      .bg-success{
        background: rgb(13, 175, 53);
        color: rgb(245, 245, 245);
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="." class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>PR</b>m</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PRIMAJASA</b> Admin</span>
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

                  <img src="../images/admin/<?php echo $r['foto']; ?>" class="user-image" alt="<?php echo $r['username']; ?>">
                  <small><?php echo $r['nama_lengkap']; ?></small>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/admin/<?php echo $r['foto']; ?>" class="img-circle" alt="<?php echo $r['username']; ?>">
                    <p>
                      <?php echo $r['nama_lengkap']; ?>
                      <small><?php echo $r['email']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?m=admin&s=profil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
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
              <img src="../images/admin/<?php echo $r['foto']; ?>" class="img-circle" alt="<?php echo $r['username']; ?>">
            </div>
            <div class="pull-left info">
              <p><?php echo $r['nama_lengkap']; ?></p>
              <a href="?m=admin&s=profil"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <li class="<?php if($aktif=='Beranda') echo 'active';?> treeview">
              <a href=".">
                <i class="fa fa-home"></i> <span>Beranda</span>
              </a>
            </li>
            <li class="<?php if($aktif=='Petugas') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Petugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=petugas"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=petugas&s=tambah"><i class="fa fa-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Kelas') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Kelas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=kelas"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=kelas&s=tambah"><i class="fa fa-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Tiket') echo 'active';?> treeview">
              <a href="#">
                  <i class="fa fa-ticket-alt"></i> <span>Tiket</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=tiket"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=tiket&s=tambah"><i class="fa fa-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Jadwal') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-calendar-alt"></i> <span>Jadwal</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=jadwal"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=jadwal&s=tambah"><i class="fa fa-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Bank') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-university"></i> <span>Bank</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=bank"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=bank&s=tambah"><i class="fa fa-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li>
              <a href="logout.php">
                <i class="fa fa-sign-out-alt"></i> <span>Keluar</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
