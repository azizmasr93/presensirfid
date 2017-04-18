<!DOCTYPE html>
<?php
include 'inc/inc.library.php';
include 'inc/cek_session.php';
include 'inc/fungsi_hdt.php';
include	'inc/inc.koneksi.php';


if($_SESSION['level']!="admin" ){
echo '<script>
alert(\'Anda Menyalahi Hak AKSES!\');
window.location="../'.$_SESSION['level'].'?module=home";
</script>	'; }

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Presensi Siskom</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets//plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets//dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PRESENSI</b> SISKOM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
    
   
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/admin.jpg" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small>Administrator</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button tempat setting -->
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
          <img src="../assets/dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
       
       <li class="header">MENU</li>
        <li><a href="?module=home"><i class="fa fa-home"></i><span>Home</span></a></li>
		<li><a href="?module=presensi"><i class="fa fa-file-text-o"></i><span>Data Presensi</span></a></li>
		<li><a href="?module=jadwal"><i class="fa fa-calendar-check-o"></i><span>Data Jadwal Kuliah</span></a></li>	
		<li><a href="?module=mata_kuliah"><i class="fa fa-th-list"></i><span>Data Mata Kuliah</span></a></li>	
		<li><a href="?module=mhs_makul"><i class="fa fa-users"></i><span>Data Mahasiswa Mata Kuliah</span></a></li>
		<li><a href="?module=kelas"><i class="fa fa-building"></i><span>Data Kelas</span></a></li>			
		<li><a href="?module=dosen"><i class="fa fa-user"></i><span>Data Dosen</span></a></li>
		<li><a href="?module=mahasiswa"><i class="fa fa-user"></i><span>Data Mahasiswa</span></a></li>

      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Presensi Kuliah Berbasis RFID
        <small> Sistem Komputer Universitas Diponegoro</small>
      </h1>
		<ol class="breadcrumb">
		
			<li><a href="#"><i class="glyphicon glyphicon-time"></i><?php echo Indonesia2Tgl(date('Y-m-d'));?> </a></li>
		</ol>
		
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<?php include "isi.php";?>
    
    
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <a href="http://siskom.undip.ac.id">Sistem Komputer Undip 2017</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
     
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
</body>
</html>
