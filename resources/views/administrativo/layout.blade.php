<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>xDrill</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  @yield('css')

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{asset('js/echarts.min.js')}}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CLI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CLIENTE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('administrativo/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          {{-- <p>Nome X</p> --}}
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-warning"></i>{{Auth::user()->company?Auth::user()->company->name:"No company"}}</a>
        </div>
      </div>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>

        {{-- <li><a href="#"><i class="fa fa-users"></i> <span>Contatos</span></a></li> --}}

         <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Wells</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.register.well') }}"><i class="fa fa-circle-o"></i> Register new well</a></li>
            <li><a href="{{ route('user.wells') }}"><i class="fa fa-circle-o"></i> Registered wells</a></li>
          </ul>
        </li> 
        <li><a href="#"><i class="fa fa-pie-chart"></i> <span>Report</span></a></li>
        <li><a href="#"><i class="fa fa-envelope"></i> <span>Contact</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.users.ativos') }}"><i class="fa fa-circle-o"></i> Actives</a></li>
            <li><a href="{{ route('user.users.inativos') }}"><i class="fa fa-circle-o"></i> Inactives</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Register New</a></li>
          </ul>
        </li>

        
        <li><a href="#"><i class="fa fa-times"></i> <span>Logout</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
      
    @if(session('danger'))
      <div class="alert alert-danger">
        {{ session('danger') }}
      </div>
    @endif

    @yield('main')
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal ARQUIVAR -->
  

  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018. Todos os direitos reservados</strong> 
  </footer>

<!-- ./wrapper -->

@yield('js')
</body>
</html>
