 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- Booststrap -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <!-- DataTable -->
  <link rel="stylesheet" href="../css/datatables.min.css">

  <link href="../css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
  
  <!-- DataTable -->
  <link rel="stylesheet" href="../css/Chart.css">

  <link rel="stylesheet" href="../css/csv.css">

  <!-- Toastr-->
  <link rel="stylesheet" href="../css/toastr.min.css">

  <!-- Select -->
  <link href="../css/select2.min.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../assets/img/UNJBG.png">

  <style>
      .sidebar-dark-color{
        background: #455279 !important;
      }

      .blanco{
        background: white;
      }
      
      .nav-item:hover{
        background: #3C8DBC;
      }

      .nav-item .active{
        background: #3C8DBC !important;
      }
      
      @media screen and (max-width: 725px) {
        .portada .unjbg-logo,.unjbg-texto{
          text-align: center;
        }
        
      }

 </style>
</header>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-lightblue">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white btn btn-outline-dark" style="border: none;" href="../controller/Logout.php" role="button"><b>Cerrar Sesion</b>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 fondo_navbar">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link bg-lightblue">
      <img src="../assets/img/UNJBG.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <b class="brand-text">Demo</b>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/img/Doctor.png" id="foto_avatar4" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>
        <div class="info">
          <input type="hidden" id="id_login_us" value="<?php echo $_SESSION['usuario'] ?>">
          <a href="#" class="d-block"><b>
            <?php
              echo $_SESSION['nombre'];
            ?>
          </b></a>
        </div>
      </div>
      <!-- Menu de opciones -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-header">USUARIOS</li>
          <li class="nav-item">
            <a href="edit_personal_data.php" class="menu nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p class="color">
                Configuraciones
              </p>
            </a>
          </li>
          <li class="nav-header">BASE DE DATOS</li>
          <li class="nav-item">
            <a href="sales_promoter_manager.php" class="menu nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p class="color">
                Registros
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="receipt_manager.php" class="menu nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p class="color">
              Billetera
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



    