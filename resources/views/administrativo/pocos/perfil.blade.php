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
  <style>
    .nao-aparecer {
      display: none;
    }
    .loader {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      margin: auto auto;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
@endsection

@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Well Information
        </h1>
        <ol class="breadcrumb">
          {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> --}}
          <li><a href="#">Wells</a></li>
          <li class="active">{{$well->title}}</li>
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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              {{-- <img class="profile-user-img img-responsive img-circle" src="{{asset('administrativo/dist/img/user4-128x128.jpg')}}" alt="User profile picture"> --}}

              <h3 class="profile-username text-center">{{$well->title}}</h3>

              {{-- <p class="text-muted text-center">Software Engineer</p> --}}

              {{-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul> --}}
              @if($well->status == 'ACTIVE')
                <a href="{{route('well.status', ['well_id' => $well->id])}}" class="btn btn-danger btn-block"><b>Inactivate Well</b></a>
              @elseif($well->status == 'INACTIVE')
                <a href="{{route('well.status', ['well_id' => $well->id])}}" class="btn btn-success btn-block"><b>Activate Well</b></a>
              @endif
              <a href="{{asset('excel_model.xlsx')}}" class="btn btn-primary btn-block" download><b>Download Excel Model</b></a>
              {{-- @if(count($well->analyses) <= 0)
                <a href="#" class="btn btn-primary btn-block"><b>Generate Analysis</b></a>
              @endif --}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          {{-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div> --}}
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#activity" data-toggle="tab">Data</a></li>
              <li class="active"><a href="#settings" data-toggle="tab">Registered Data</a></li>
              {{-- <li><a href="#timeline" data-toggle="tab">Alterar Senha</a></li> --}}
              {{-- <li><a href="#bank" data-toggle="tab">Dados de bancários</a></li> --}}
            </ul>
            <div class="tab-content">
              @if(count($well->datas) <= 0)
                <div class="col-md-12" style="margin-bottom:20px">
                  <form action="{{route('import.well.data')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="excel" class="form-control" required>
                    <input type="hidden" hidden name="well_id" value="{{$well->id}}">
                    <button type="submit" class="btn btn-primary btn-sm">Import data</button>
                  </form>
                </div>
                <hr>
              @endif
              <div class="tab-pane" id="activity">
                <!-- Post -->
                {{-- <div class="post">
                  <div class="user-block">
                    <span class="description">7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  

                </div>
                <!-- /.post -->

                <div class="post">
                    <div class="user-block">
                      <span class="description">7:30 PM today</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      Lorem ipsum represents a long-held tradition for designers,
                      typographers and the like. Some people hate it and argue for
                      its demise, but others ignore the hate as they create awesome
                      tools to help create filler text for everyone from bacon lovers
                      to Charlie Sheen fans.
                    </p>
                    
  
                </div> --}}
                  <!-- /.post -->


                  <table id="tabela" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Depth</th>
                          <th>ROP</th>
                          <th>RPM</th>
                          <th>WOB</th>
                          <th>TFLO</th>
                          <th>STOR</th>
                          <th>MSE</th>
                          <th>MI</th>
                          <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($well->datas as $data)
                        <tr>
                            <td>{{$data->depth}}</td>
                            <td>{{$data->rop}}</td>
                            <td>{{$data->rpm}}</td>
                            <td>{{$data->wob}}</td>
                            <td>{{$data->tflo}}</td>
                            <td>{{$data->stor}}</td>
                            <td>{{$data->mse}}</td>
                            <td>{{$data->mi}}</td>
                            <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDeletar"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                
              </div>

              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" action="{{route('update.well')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">*Title</label>

                    <div class="col-sm-10">
                      <input type="text" name="title" value="{{$well->title}}" class="form-control" id="inputTitle" placeholder="Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">*Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" value="{{$well->name}}" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputDescricao" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10">
                      <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Well description">{{$well->description}}</textarea>
                      {{-- <input type="text" class="form-control" id="inputDescricao" placeholder="Descricao"> --}}
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="zoneName" class="col-sm-2 control-label">Zone</label>
                      <div class="col-sm-10">
                        <select name="zone_id" class="form-control" id="zones">
                          @foreach($zones as $zone)
                            @if($zone->id == $well->zone_id)
                              <option selected value="{{$zone->id}}">{{$zone->name}}</option>
                            @else
                              <option value="{{$zone->id}}">{{$zone->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10" id="inputCountry">
                      <input type="text" disabled class="form-control"  placeholder="{{$zone->country->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputContinent" class="col-sm-2 control-label">Continent</label>

                    <div class="col-sm-10" id="inputContinent">
                      <input class="form-control" disabled placeholder="{{$zone->country->continent->name}}">
                    </div>
                  </div>
                  <input type="hidden" hidden name="well_id" value="{{$well->id}}">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        @if(count($well->datas) > 0)
          <div class="col-md-12 align-self-center">
            <button id="graphs" class="btn btn-xs btn-primary">Graphs</button>
            <button id="depthWOB" class="btn btn-xs btn-primary">Depth x WOB</button>
            <button id="depthROP" class="btn btn-xs btn-primary">Depth x ROP</button>
            <button id="depthMSE" class="btn btn-xs btn-primary">Depth x MSE</button>
            <button id="mseWOB" class="btn btn-xs btn-primary">WOB x MSE</button>
            <button id="ropWOB" class="btn btn-xs btn-primary">WOB x ROP</button>
            <div class="nav-tabs-custom nao-aparecer" id="graphs_div">
              
            </div>
          </div>
        @endif
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>  

    <div class="modal fade" id="modalEditar" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Well data Edit</h4>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="profundidade">Depth</label>
                          <input id="profundidade" type="text" name="depth" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="rop">ROP</label>
                          <input id="rop" type="text" name="rop" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="rpm">RPM</label>
                          <input id="rpm" type="text" name="rpm" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="wob">WOB</label>
                          <input id="wob" type="text" name="wob" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="tlfo">TLFO</label>
                          <input id="tlfo" type="text" name="tlfo" class="form-control" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalDeletar" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edicao de Dado de Poco</h4>
                </div> --}}
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                      <h4>Are you sure you want to delete this data?</h4>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes, delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <!-- jQuery 3 -->
<script src="{{asset('administrativo/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('administrativo/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('administrativo/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('administrativo/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('administrativo/dist/js/demo.js')}}"></script>
<script type="text/javascript">
  $('#graphs').on('click', function(e){
    $('#graphs_div').empty();
    $('#graphs_div').removeClass('nao-aparecer');
    $('#graphs_div').append('<div class="col-md-12" id="primary1" style="width:100%; height:400px;">'+
                    '<div id="loader1" class="loader" style="margin: 15px"></div>'+
                    '</div>'+
                    '<div class="col-md-12" id="primary2" style="width:100%; height:400px;">'+
                        '<div id="loader2" class="loader" style="margin: 15px"></div>'+
                    '</div>'+
                    '<div class="col-md-12" id="secondary1" style="width:100%; height:400px;">'+
                        '<div id="loader3" class="loader" style="margin: 15px"></div>'+
                    '</div>'+
                    '<div class="col-md-12" id="secondary2" style="width:100%; height:400px;">'+
                        '<div id="loader4" class="loader" style="margin: 15px"></div>'+
                    '</div>'+
                    '<div class="col-md-12" id="secondary3" style="width:100%; height:400px;">'+
                        '<div id="loader5" class="loader" style="margin: 15px"></div>'+
                    '</div>'
                    );
    // $('#graphs_div').append('<div id="main" style="width:100%; height:400px;"></div>');
      $.get("{{route('json.depth_wob', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader3');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('secondary1'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'Depth x WOB'
            },
            tooltip: {},
            legend: {
                data:['DepthxWOB']
            },
            xAxis: {
              name: 'Depth, m',
              data: data.depth
            },
            yAxis: {
              name: 'WOB, klbf'
            },
            series: [{
                name: 'Depth',
                type: 'line',
                data: data.wob,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
      $.get("{{route('json.depth_rop', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader4');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('secondary2'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'Depth x ROP'
            },
            tooltip: {},
            legend: {
                data:['DepthxROP']
            },
            xAxis: {
              name: 'Depth, m',
              data: data.depth
            },
            yAxis: {
              name: 'ROP, m/h'
            },
            series: [{
                name: 'Depth',
                type: 'line',
                data: data.rop,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
      $.get("{{route('json.depth_mse', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader5');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('secondary3'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'Depth x MSE'
            },
            tooltip: {},
            legend: {
                data:['DepthxMSE']
            },
            xAxis: {
              name: 'Depth, m',
              data: data.depth
            },
            yAxis: {
              name: 'MSE, Psi'
            },
            series: [{
                name: 'Depth',
                type: 'line',
                data: data.mse,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
      $.get("{{route('json.wob_mse', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader1');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('primary1'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'WOB x MSE'
            },
            tooltip: {},
            legend: {
                data:['WOBxMSE']
            },
            xAxis: {
              name: 'WOB, lbf',
              data: data.wob
            },
            yAxis: {
              name: 'MSE, Psi'
            },
            series: [{
                name: 'WOB',
                type: 'line',
                data: data.mse,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
      $.get("{{route('json.rop_wob', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader2');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('primary2'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'WOB x ROP'
            },
            tooltip: {},
            legend: {
                data:['ROPxWOB']
            },
            xAxis: {
              name: 'WOB, klbf',
              data: data.wob
            },
            yAxis: {
              name: 'ROP, m/h'
            },
            series: [{
                name: 'ROP',
                type: 'line',
                data: data.rop,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
  });
</script>
<script type="text/javascript">
  $('#depthROP').on('click', function(e){
    $('#graphs_div').empty();
    $('#graphs_div').removeClass('nao-aparecer');
    $('#graphs_div').append(
                    '<div class="col-md-12" id="secondary2" style="width:100%; height:400px;">'+
                        '<div id="loader4" class="loader" style="margin: 15px"></div>'+
                    '</div>'
                    );
      $.get("{{route('json.depth_rop', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader4');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('secondary2'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'Depth x ROP'
            },
            tooltip: {},
            legend: {
                data:['DepthxROP']
            },
            xAxis: {
              name: 'Depth, m',
              data: data.depth
            },
            yAxis: {
              name: 'ROP, m/h'
            },
            series: [{
                name: 'Depth',
                type: 'line',
                data: data.rop,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
  });
</script>
<script type="text/javascript">
  $('#depthWOB').on('click', function(e){
    $('#graphs_div').empty();
    $('#graphs_div').removeClass('nao-aparecer');
    $('#graphs_div').append(
                    '<div class="col-md-12" id="secondary1" style="width:100%; height:400px;">'+
                        '<div id="loader3" class="loader" style="margin: 15px"></div>'+
                    '</div>'
                    );
    // $('#graphs_div').append('<div id="main" style="width:100%; height:400px;"></div>');
      $.get("{{route('json.depth_wob', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader3');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('secondary1'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'Depth x WOB'
            },
            tooltip: {},
            legend: {
                data:['DepthxWOB']
            },
            xAxis: {
              name: 'Depth, m',
              data: data.depth
            },
            yAxis: {
              name: 'WOB, klbf'
            },
            series: [{
                name: 'Depth',
                type: 'line',
                data: data.wob,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
  });
</script>
<script type="text/javascript">
  $('#depthMSE').on('click', function(e){
    $('#graphs_div').empty();
    $('#graphs_div').removeClass('nao-aparecer');
    $('#graphs_div').append(
                    '<div class="col-md-12" id="secondary3" style="width:100%; height:400px;">'+
                        '<div id="loader5" class="loader" style="margin: 15px"></div>'+
                    '</div>'
                    );
      $.get("{{route('json.depth_mse', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader5');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('secondary3'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'Depth x MSE'
            },
            tooltip: {},
            legend: {
                data:['DepthxMSE']
            },
            xAxis: {
              name: 'Depth, m',
              data: data.depth
            },
            yAxis: {
              name: 'MSE, Psi'
            },
            series: [{
                name: 'Depth',
                type: 'line',
                data: data.mse,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
  });
</script>
<script type="text/javascript">
  $('#mseWOB').on('click', function(e){
    $('#graphs_div').empty();
    $('#graphs_div').removeClass('nao-aparecer');
    $('#graphs_div').append('<div class="col-md-12" id="primary1" style="width:100%; height:400px;">'+
                    '<div id="loader1" class="loader" style="margin: 15px"></div>'+
                    '</div>'
                    );
      $.get("{{route('json.wob_mse', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader1');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('primary1'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'WOB x MSE'
            },
            tooltip: {},
            legend: {
                data:['WOBxMSE']
            },
            xAxis: {
              name: 'WOB, lbf',
              data: data.wob
            },
            yAxis: {
              name: 'MSE, Psi'
            },
            series: [{
                name: 'WOB',
                type: 'line',
                data: data.mse,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
  });
</script>
<script type="text/javascript">
  $('#ropWOB').on('click', function(e){
    $('#graphs_div').empty();
    $('#graphs_div').removeClass('nao-aparecer');
    $('#graphs_div').append(
                    '<div class="col-md-12" id="primary2" style="width:100%; height:400px;">'+
                        '<div id="loader2" class="loader" style="margin: 15px"></div>'+
                    '</div>'
                    );
      $.get("{{route('json.rop_wob', ['well_id' => $well->id])}}", function(data) {
        var element = document.getElementById('loader2');
        element.parentNode.removeChild(element);
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('primary2'));

        // specify chart configuration item and data
        var option = {
            
            title: {
                text: 'WOB x ROP'
            },
            tooltip: {},
            legend: {
                data:['ROPxWOB']
            },
            xAxis: {
              name: 'WOB, klbf',
              data: data.wob
            },
            yAxis: {
              name: 'ROP, m/h'
            },
            series: [{
                name: 'ROP',
                type: 'line',
                data: data.rop,
                smooth: true
                // animationDuration: 1000
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
      });
  });
</script>

<!-- DataTables -->
<script src="{{asset('administrativo/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('administrativo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#tabela').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true,
    });
  })
</script>
<script type="text/javascript">
  $('#zones').on('change', function(e){
      var zone_id = e.target.value;
      $.get("{{route('json.zone.data', ['zone_id' => "+zone_id+"])}}",function(data) {
        $('#inputCountry').empty();
        $('#inputContinent').empty();
        $('#inputCountry').append('<option value="'+ data.country.id +'">'+ data.country.name +'</option>');
        $('#inputContinent').append('<option value="'+ data.continent.id +'">'+ data.continent.name +'</option>');
      });
  });
</script>
@endsection