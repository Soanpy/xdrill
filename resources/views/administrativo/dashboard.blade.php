@extends('administrativo.layout')

@section('css')
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('administrativo/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('administrativo/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('administrativo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('main')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                <h3>1</h3>
    
                <p>Total de poços</p>
                </div>
                <div class="icon">
                <i class="ion ion-cube"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                <h3>53</h3>
    
                <p>Análises</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>2</h3>
                <p>Total de Usuários na Empresa</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">

                <div class="inner">
                <h3>65</h3>
                <p>Novas analises na semana</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          {{-- <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Acessos ao site</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Acessos por segmento</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Métricas</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div> --}}
          <!-- /.nav-tabs-custom -->

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Últimas Análises</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  {{-- <input type="checkbox" value=""> --}}
                  <!-- todo text -->
                  <span class="text">Nome do usuário</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    {{-- <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i> --}}
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  {{-- <input type="checkbox" value=""> --}}
                  <span class="text">Nome do usuário</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 4 horas</small>
                  <div class="tools">
                    {{-- <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i> --}}
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  {{-- <input type="checkbox" value=""> --}}
                  <span class="text">Nome do usuário</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 dia</small>
                  <div class="tools">
                    {{-- <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i> --}}
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  {{-- <input type="checkbox" value=""> --}}
                  <span class="text">Nome do usuário</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 3 dias</small>
                  <div class="tools">
                    {{-- <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i> --}}
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  {{-- <input type="checkbox" value=""> --}}
                  <span class="text">Nome do usuário</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 semana</small>
                  <div class="tools">
                    {{-- <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i> --}}
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  {{-- <input type="checkbox" value=""> --}}
                  <span class="text">Nome do usuário</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 1 mês</small>
                  <div class="tools">
                    {{-- <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i> --}}
                  </div>
                </li>
              </ul>
            </div>
           
          </div>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
      </div>
    
    </section>
@endsection

@section('js')
    <!-- jQuery 3 -->
    <script src="{{asset('administrativo/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('administrativo/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('administrativo/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('administrativo/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('administrativo/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('administrativo/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('administrativo/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('administrativo/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('administrativo/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('administrativo/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('administrativo/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('administrativo/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('administrativo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('administrativo/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('administrativo/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('administrativo/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('administrativo/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('administrativo/dist/js/demo.js')}}"></script>
@endsection