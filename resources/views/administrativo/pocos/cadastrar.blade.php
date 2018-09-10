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
            Formulário de cadastro
            {{-- <small>Preview</small> --}}
        </h1>
        <ol class="breadcrumb">
            {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> --}}
            <li class="active"><a href="#">Cadastro de Poço</a></li>
            {{-- <li class="active">General Elements</li> --}}
        </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Cadastro de poço</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tituloPoco">*Titulo</label>
                            <input type="text" name="titulo" class="form-control" id="tituloPoco" placeholder="Coloque o nome do poço">
                        </div>
                        <div class="form-group">
                            <label for="descricaoPoco">*Descrição</label>
                            <textarea name="descricao" id="descricaoPoco" class="form-control" cols="30" rows="10">Escreva a descrição do poço</textarea>
                            {{-- <input type="text" class="form-control" id="descricaoPoco" placeholder="Descricao"> --}}
                        </div>
                        <div class="form-group">
                            <label for="fotoPoco">Foto representativa do poço</label>
                            <input type="file" id="fotoPoco">
            
                            {{-- <p class="help-block">Example block-level help text here.</p> --}}
                        </div>
                        {{-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div> --}}
                    </div>
                    <!-- /.box-body -->
        
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    </form>
                </div>
    
            </div>
            <!--/.col (left) -->
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