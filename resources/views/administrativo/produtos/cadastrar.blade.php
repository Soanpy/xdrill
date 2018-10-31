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
            Cadastro de produto
        </h1>
        
        </section>
    
        <!-- Main content -->
        <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
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
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.produtos.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" placeholder="Nome do produto" name="nome" />
                            </div>
                            
                            <div class="form-group">
                                <label>Selecione a categoria do produto</label>
                                <select name="categoria_id" class="form-control" required>
                                    @foreach($segmentos as $segmento)
                                        <option disabled><b>{{$segmento->nome}}</b></option>
                                        @foreach($segmento->categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                        @endforeach
                                        <option disabled=""></option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto" required/>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" rows="5" name="descricao" required  placeholder="Descreção | Características | Dimensões | Tamanho"></textarea>
                            </div>

                            {{-- <div class="form-group">
                                <label>Unidade de venda do produto</label>
                                <input type="text" class="form-control" name="unidade" placeholder="Ex: Caixa com 50 unidades" name="nome" />
                            </div>

                            <div class="form-group">
                                <label>Preço de venda por unidade de venda do produto</label>
                                <input type="text" name="preco" class="form-control money" placeholder="Preço" required name="nome" />
                            </div> --}}
                        </div>
                        <!-- /.box-body -->
            
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right">Cadastrar Produto</button>
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
<script type="text/javascript" src="{{asset('maskMoney/dist/jquery.maskMoney.min.js')}}"></script>
    <script>
        $(function() {
            $('.money').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
        })
    </script>
@endsection