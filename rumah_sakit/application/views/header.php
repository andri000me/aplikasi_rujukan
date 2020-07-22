<?php 
$s=$_SESSION['id'];
if($s==""){ 
  redirect(site_url('auth'));
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/chartjs/Chart.js">
  <!-- css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
   <!-- Ini datepicker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
.chart-container {
  position: relative;
  margin: auto;
  
}


</style>


  <style>
    table.table thead 
    {
      background-color:#6637e6;
      width:auto;
    }
    table.table th
    {
      color:white;
    }
    /* table thead 
    {
      background-color:#605CA8;
      width:auto;
    }
    table th
    {
      color:white;
    } */
    
  </style>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('dashboard') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"> <img src="<?php echo base_url()?>assets_log/img/index.png" alt="Metis Logo" style="width:25px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="filter: drop-shadow(1px 1px 0px #222); ">DASHBOARD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>image/user_admin.jpeg" class="user-image" alt="User Image">
              <span class="hidden-xs"><b>
                  <?php echo strtoupper($_SESSION['username']);?>
                 </b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>image/user_admin.jpeg" class="img-circle" alt="User Image">

                <p><b>
                  <?php echo strtoupper($_SESSION['username']); ?>
                 </b>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('user/update/'.$_SESSION['id']);?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
          <img src="<?php echo base_url()?>image/user_admin.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($_SESSION['username']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <!-- <li class="active treeview">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-home"></i> <span>Lihat Web</span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Master Data</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('user')?>"><i class="fa fa-circle-o"></i>User</a></li>
            <li><a href="<?php echo base_url('pasien')?>"><i class="fa fa-circle-o"></i>Pasien UMUM & BPJS</a></li>
            <li><a href="<?php echo base_url('pegawai')?>"><i class="fa fa-circle-o"></i>Pegawai</a></li>
            <li><a href="<?php echo base_url('jabatan')?>"><i class="fa fa-circle-o"></i>Jabatan</a></li>
            <li><a href="<?php echo base_url('penyakit')?>"><i class="fa fa-circle-o"></i>Penyakit</a></li>
            <li><a href="<?php echo base_url('obat')?>"><i class="fa fa-circle-o"></i>Obat</a></li>
            <li><a href="<?php echo base_url('diagnosa')?>"><i class="fa fa-circle-o"></i>Diagnosa</a></li>
            <li><a href="<?php echo base_url('pemeriksaan_fisik')?>"><i class="fa fa-circle-o"></i>Pemeriksaan Fisik</a></li>
            <li><a href="<?php echo base_url('poli')?>"><i class="fa fa-circle-o"></i>Poli</a></li>
            <li><a href="<?php echo base_url('rumah_sakit_rujukan')?>"><i class="fa fa-circle-o"></i>Rumah Sakit Rujukan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-o"></i>
            <span>Surat</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('surat_umum')?>"><i class="fa fa-circle-o"></i>Surat Rujukan Pasien UMUM</a></li>
            <li><a href="<?php echo base_url('surat_bpjs')?>"><i class="fa fa-circle-o"></i>Surat Rujukan Pasien BPJS</a></li>
          </ul>
        </li>
      
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporan_pdf/cetak_user')?>"><i class="fa fa-file-pdf-o"></i> Laporan Data User</a></li>
            <!-- <li><a href="<?php echo base_url('laporan_pdf/cetak_kendaraan')?>"><i class="fa fa-file-pdf-o"></i> Laporan Data Kendaraan</a></li>
            <li><a href="<?php echo base_url('laporan_pdf/cetak_sopir')?>"><i class="fa fa-file-pdf-o"></i> Laporan Data Sopir</a></li>
            <li><a href="<?php echo base_url('laporan_pdf/cetak_anggota')?>"><i class="fa fa-file-pdf-o"></i> Laporan Data Petugas</a></li>
            <li><a href="<?php echo base_url('laporan_pdf/index2')?>"><i class="fa fa-file-pdf-o"></i> Laporan Pengeluaran BBM</a></li> -->
          </ul>
        </li>
         <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i><span>Setting Tema</span></a>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">