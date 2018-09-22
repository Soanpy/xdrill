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
          Perfil do Poço
        </h1>
        <ol class="breadcrumb">
          {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> --}}
          <li><a href="#">Poços</a></li>
          <li class="active">Título do poço</li>
        </ol>
      </section>

      <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('administrativo/dist/img/user4-128x128.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">Titulo do poco</h3>

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

              <a href="#" class="btn btn-danger btn-block"><b>Inativar</b></a>
              <a href="#" class="btn btn-success btn-block"><b>Ativar</b></a>
              <a href="#" class="btn btn-primary btn-block"><b>Plotar grafico</b></a>
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
              <li class="active"><a href="#activity" data-toggle="tab">Dados</a></li>
              <li><a href="#settings" data-toggle="tab">Dados de cadastro</a></li>
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
                          <th>Profundidade</th>
                          <th>ROP</th>
                          <th>RPM</th>
                          <th>WOB</th>
                          <th>TFLO</th>
                          <th>Opcoes</th>
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
                    <label for="inputName" class="col-sm-2 control-label">Titulo</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Titulo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDescricao" class="col-sm-2 control-label">Descricao</label>

                    <div class="col-sm-10">
                      <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Descricao"></textarea>
                      {{-- <input type="text" class="form-control" id="inputDescricao" placeholder="Descricao"> --}}
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
@endsection