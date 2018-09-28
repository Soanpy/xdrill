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
          Meu Perfil
        </h1>
        
      </section>

      <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Personal Data</a></li>
              <li><a href="#timeline" data-toggle="tab">Update Password</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="activity">
                
                <form class="form-horizontal" method="post" action="{{ route('admin.update.data') }}">
                    @csrf
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Name</label>
  
                      <div class="col-sm-10">
                        <input type="text" required class="form-control" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Email</label>
  
                      <div class="col-sm-10">
                        <input type="email" required class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
  
                      <div class="col-sm-10">
                        <input type="text" required class="form-control" name="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputCellphone" class="col-sm-2 control-label">Cellphone</label>
  
                      <div class="col-sm-10">
                        <input type="text" required class="form-control" name="cellphone" placeholder="Cellphone" value="{{ Auth::user()->cellphone }}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                      </div>
                    </div>
                  </form>
              </div>
              <!-- /.tab-pane -->

              {{-- <div class="tab-pane" id="timeline">
                <form class="form-horizontal" method="post" action="{{ route('admin.alterar.senha') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Senha atual</label>

                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="senha_atual" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Nova senha</label>

                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="nova_senha" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Confirmar nova senha</label>

                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="confirma_senha" placeholder="**********">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 ">
                        <button type="submit" class="btn btn-success pull-right">Alterar</button>
                        </div>
                    </div>
                </form>

              </div> --}}
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