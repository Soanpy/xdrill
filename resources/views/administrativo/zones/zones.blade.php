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
            Well
            {{-- <small>dinamica</small> --}}
        </h1>
        <ol class="breadcrumb">
            {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Tabela</a></li>
            <li><a href="#">Tables</a></li> --}}
            <li class="active">Registered Wells</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Registered wells table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Continent</th>
                            <th>Country</th>
                            <th>Creator</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($zones as $zone)
                            <tr>
                                <td>{{$zone->name}}</td>
                                <td>{{$zone->continent->name}}</td>
                                <td>{{$zone->country->name}}</td>
                                <td>{{$zone->creator->name}}</td>
                                @if($zone->creator->id == Auth::user()->id)
                                    <td><a href="#" data-toggle="modal" data-target="#modalEdit" class="btn btn-xs btn-primary">Edit</a></td>
                                @endif
                            </tr>
                            <div class="modal fade" id="modalEdit" role="dialog">
                                <div class="modal-dialog">
                        
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edicao de Dado de Poco</h4>
                                        </div> --}}
                                        <form action="{{route('edit.zone.name')}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                              <h4>Zone name edition</h4>
                                              <div class="form-group">
                                                  <label for="zoneName">Zone name</label>
                                                  <input type="text" class="form-control" name="name" value="{{$zone->name}}">
                                                  <input type="text" hidden class="form-control" name="name" value="{{$zone->id}}">
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                        
                                </div>
                            </div>
                        @endforeach

                    </tbody>
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
    $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
    });
  })
</script>
@endsection