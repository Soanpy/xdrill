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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('administrativo/dist/img/user4-128x128.jpg')}}" alt="User profile picture">

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
              @if(count($well->analyses) <= 0)
                <a href="#" class="btn btn-primary btn-block"><b>Generate Analysis</b></a>
              @endif
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
              <li class="active"><a href="#activity" data-toggle="tab">Data</a></li>
              <li><a href="#settings" data-toggle="tab">Registered Data</a></li>
              {{-- <li><a href="#timeline" data-toggle="tab">Alterar Senha</a></li> --}}
              {{-- <li><a href="#bank" data-toggle="tab">Dados de bancários</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Depth</th>
                          <th>ROP</th>
                          <th>RPM</th>
                          <th>WOB</th>
                          <th>TFLO</th>
                          <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>200</td>
                            <td>100</td>
                            <td>100</td>
                            <td>100</td>
                            <td>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDeletar"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>                    
                  </table>
                
              </div>

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">*Title</label>

                    <div class="col-sm-10">
                      <input type="text" name="title" value="{{$well->title}}" class="form-control" id="inputName" placeholder="Title">
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
                      <label for="inputContinente" class="col-sm-2 control-label">Zone</label>
  
                      <div class="col-sm-10">
                        <input class="form-control" disabled id="inputContinente" placeholder="Zone name">
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="inputPais" class="col-sm-2 control-label">Pais</label>

                    <div class="col-sm-10">
                      <select name="" id="" class="form-control">
                        <option value="">Pais 1</option>
                        <option value="">Pais 2</option>
                        <option value="">Pais 3</option>
                        <option value="">Pais 4</option>
                        <option value="">Pais 5</option>
                        <option value="">Pais 6</option>
                        <option value="">Pais 7</option>
                      </select>
                      {{-- <input type="text" class="form-control" id="inputPais" placeholder="Pais"> --}}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputContinente" class="col-sm-2 control-label">Continente</label>

                    <div class="col-sm-10">
                      <input class="form-control" disabled id="inputContinente" placeholder="Continente X">
                    </div>
                  </div>
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

        <div class="col-md-12">
          <div class="nav-tabs-custom">
              <div id="main" style="width:100%; height:400px;"></div>
          </div>
        </div>
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
                    <h4 class="modal-title">Edicao de Dado de Poco</h4>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="profundidade">Profundidade</label>
                          <input id="profundidade" type="text" name="nome" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="rop">ROP</label>
                          <input id="rop" type="text" name="nome" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="rpm">RPM</label>
                          <input id="rpm" type="text" name="nome" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="wob">WOB</label>
                          <input id="wob" type="text" name="nome" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="tlfo">TLFO</label>
                          <input id="tlfo" type="text" name="nome" class="form-control" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
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
                      <h4>Voce tem certeza que deseja deletar esse dado?</h4>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Nao</button>
                        <button type="submit" class="btn btn-danger">Sim, deletar</button>
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
  // based on prepared DOM, initialize echarts instance
  var myChart = echarts.init(document.getElementById('main'));

  // specify chart configuration item and data
  var option = {
      title: {
          text: 'Title of the Analysis'
      },
      tooltip: {},
      legend: {
          data:['Which Data']
      },
      xAxis: {
          data: ["shirt","cardign","chiffon shirt","pants","heels","socks"]
      },
      yAxis: {},
      series: [{
          name: 'Sales',
          type: 'line',
          data: [5, 20, 36, 10, 10, 20]
      }]
  };

  // use configuration item and data specified to show chart
  myChart.setOption(option);
</script>
@endsection