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
            Produtos em destaque
        </h1>
        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
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
                <div class="box-header">
                <h3 class="box-title">Produtos em destaque na página incial</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Segmento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $key => $produto)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$produto->foto) }}" style="width: 100px;"/>
                                </td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->categoria->categoria->nome }}</td>
                                <td>{{ $produto->categoria->categoria->segmento->nome }}</td>
                                <td>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalArquivar{{$key}}">Arquivar</a><br/>
                                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEditar{{$key}}">Editar</a><br/>
                                    @if($produto->destaque == true)
                                        <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalDestacar{{$key}}">Tirar de destaque</a>                                    
                                    @else
                                        <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalDestacar{{$key}}">Colocar em destaque</a>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal ARQUIVAR -->
                            <div class="modal fade" id="modalArquivar{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exemploModalArquivar{{$key}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exemploModalArquivar{{$key}}">Arquivar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.produto.arquivar', ['produto_id' => $produto->id])}}" method="get">
                                            <div class="modal-body">
                                                <h5>Você tem certeza que quer arquivar o produto {{$produto->nome}} ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Arquivar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal EDITAR -->
                            <div class="modal fade" id="modalEditar{{$key}}" tabindex="-1" role="dialog" aria-labelledby="titulo_modal{{$key}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="titulo_modal{{$key}}">Edição de dados do produto {{$produto->nome}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.produto.update')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" value="{{$produto->nome}}" placeholder="Nome do produto" name="nome" />
                                            </div>
                                            <input type="hidden" class="form-control" value="{{$produto->id}}" placeholder="Nome do produto" name="produto_id" hidden/>                                            
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" class="form-control" name="foto" />
                                            </div>
                
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea class="form-control" rows="5" name="descricao" required  placeholder="Descreção | Características | Dimensões | Tamanho">{{$produto->descricao}}</textarea>
                                            </div>
                
                                            <div class="form-group">
                                                <label>Unidade de venda do produto</label>
                                                <input type="text" class="form-control" value="{{$produto->unidade}}" name="unidade" placeholder="Ex: Caixa com 50 unidades" name="nome" />
                                            </div>
                
                                            <div class="form-group">
                                                <label>Preço de venda por unidade de venda do produto</label>
                                                <input type="text" name="preco"  value="{{$produto->preco}}" class="form-control money" placeholder="Preço" required name="nome" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal ARQUIVAR -->
                            <div class="modal fade" id="modalDestacar{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exemploModalDestacar{{$key}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exemploModalDestacar{{$key}}">Arquivar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.produto.destaque', ['produto_id' => $produto->id])}}" method="get">
                                            <div class="modal-body">
                                                @if($produto->destaque == true)
                                                    <h5>Tirar {{$produto->nome}} de destaque?</h5>
                                                @else
                                                    <h5>Destacar {{$produto->nome}}?</h5>  
                                                @endif                                                  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                @if($produto->destaque == true)
                                                    <button type="submit" class="btn btn-danger">Sim</button>
                                                @else
                                                    <button type="submit" class="btn btn-success">Sim</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    
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
<script type="text/javascript" src="{{asset('maskMoney/dist/jquery.maskMoney.min.js')}}"></script>
<script>
    $(function() {
        $('.money').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    })
</script>
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