@extends('administrativo.layout')

@section('css')
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('administrativo/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('administrativo/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('administrativo/dist/css/skins/_all-skins.min.css')}}">
@endsection

@section('main')
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tabela
            <small>dinamica</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Tabela</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Dinamica</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                        </tr>
                    
                </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
@endsection

@section('js')
<script src="{{asset('administrativo/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('administrativo/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('administrativo/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('administrativo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('administrativo/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('administrativo/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('administrativo/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('administrativo/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection