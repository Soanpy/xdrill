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
          @if($segmento) {{ $segmento->nome }} @else Cadastro de Segmento @endif
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Segmentos</a></li>
            @if($segmento) <li class="active">{{ $segmento->nome }}</li> @endif
        </ol>
      </section>

      <section class="content">

      <div class="row">
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        @if(session('danger') || session('errors'))
          <div class="alert alert-danger">
            {{ session('success') }}
            {{ session('errors') }}
          </div>
        @endif
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if($segmento !=null && $segmento->logo)
                <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/'.$segmento->logo)}}" alt="User profile picture">
              @else
               <img class="profile-user-img img-responsive img-circle" alt="LOGO NÃO CADASTRADA">
              @endif

                @if($segmento)
                  <h3 class="profile-username text-center">{{ $segmento->nome }}</h3>

                  @if($segmento->status == 'ATIVO')
                    <a href="{{ route('admin.segmento.desativar',['segmento_id' => $segmento->id]) }}" class="btn btn-danger btn-block"><b>Desativar</b></a>
                  @else
                    <a href="{{ route('admin.segmento.ativar',['segmento_id' => $segmento->id]) }}" class="btn btn-success btn-block"><b>Ativar</b></a>
                  @endif
                  @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Dados de cadastro</a></li>
                @if($segmento)
              <li><a href="#timeline" data-toggle="tab">Categorias</a></li>
              <li><a href="#settings" data-toggle="tab">Produtos</a></li>
              @endif
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
            @if($segmento)
                <form class="form-horizontal" method="post" action="{{ route('admin.update.segmento') }}" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $segmento->id }}" required name="segmento_id"/>
            @else
                <form class="form-horizontal" method="post" action="{{ route('admin.cadastra.segmento') }}" enctype="multipart/form-data">
            @endif
                    @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nome</label>

                    <div class="col-sm-10">
                      <input type="text" name="nome" class="form-control" id="inputName" @if($segmento) value="{{ $segmento->nome }}" @endif placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Descrição</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="descricao">@if($segmento){{ $segmento->descricao }} @endif</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <img style="width: 250px; height: 250px;" class="profile-user-img img-responsive" @if($segmento) src="{{asset('storage/'.$segmento->logo)}}" @endif alt="Nenhum banner cadastrado">
                    <label for="inputName" class="col-sm-2 control-label">Logo <br>(250 x 250 pixels)</label>

                    <div class="col-sm-10">
                      <input type="file" name="logo"/>
                    </div>
                  </div>
                  <div class="form-group">

                    <img style="width: 675px; height: 50px;" class="profile-user-img img-responsive" @if($segmento) src="{{asset('storage/'.$segmento->banner_principal)}}" @endif alt="Nenhum banner cadastrado">
                    <label for="inputExperience" class="col-sm-2 control-label">Banner principal <br>(1350 x 100 pixels)</label>

                    <div class="col-sm-10">
                      <input type="file" name="banner_principal">
                    </div>
                  </div>
                  <div class="form-group">
                    <img style="width: 325px; height: 155px;" class="profile-user-img img-responsive" @if($segmento) src="{{asset('storage/'.$segmento->imagem)}}" @endif alt="Nenhuma imagem cadastrada">
                    <label for="inputExperience" class="col-sm-2 control-label">Imagem da página inicial <br>(700 x 400 pixels)</label>

                    <div class="col-sm-10">
                      <input type="file" name="imagem">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" style="width: 100%; ">@if($segmento) Atualizar @else Salvar @endif</button>
                    </div>
                  </div>
                </form>
                
              </div>
                @if($segmento)
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="box">
                  
                  <div class="box-header">
                    <h3 class="box-title"><a data-toggle="modal" data-target="#modalCategoriaCadastrar" class="btn btn-success">Adicionar categoria</a></h3>

                    <div class="modal fade" id="modalCategoriaCadastrar" tabindex="-1" role="dialog" aria-labelledby="exemploModalCategoriaCadastrar" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exemploModalCategoriaCadastrar">Cadastro de nova categoria</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="{{route('admin.categoria.create')}}" method="POST">
                                @csrf
                                  <div class="modal-body">
                                      <div class="form-group">
                                        <input name="nome" type="text" class="form-control" required/>
                                        <input name="segmento_id" value="{{ $segmento->id }}" type="hidden" class="form-control" required/>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-success">Cadastrar</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="50%">Nome</th>
                              <th width="50%"></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($segmento->categorias as $key => $categoria)
                              <tr>
                                  <td>{{ $categoria->nome }}</td>
                                  <td>
                                      @if($categoria->status == 'ATIVO')
                                        <a href="{{ route('admin.categoria.ativar',['categoria_id' => $categoria->id]) }}" class="btn btn-xs btn-warning">Desativar</a>
                                      @else
                                        <a href="{{ route('admin.categoria.ativar',['categoria_id' => $categoria->id]) }}" class="btn btn-xs btn-success" >Ativar</a>
                                      @endif
                                      <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEditar{{$key}}">Editar</a>
                                      <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalArquivar{{$key}}">Exlcuir</a>
                                  </td>
                              </tr>

                              <!-- Modal ARQUIVAR -->
                              <div class="modal fade" id="modalArquivar{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exemploModalArquivar{{$key}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exemploModalArquivar{{$key}}">Excluir</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{route('admin.categoria.arquivar', ['categoria_id' => $categoria->id])}}" method="get">
                                              <div class="modal-body">
                                                  <h3>Você tem certeza que quer exluir a categoria {{$categoria->nome}} ?</h3>
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
                                          <h5 class="modal-title" id="titulo_modal{{$key}}">Edição da categoria {{$categoria->nome}}</h5>
                                         
                                      </div>
                                      <form action="{{route('admin.categoria.update')}}" method="POST" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label>Nome</label>
                                                  <input type="text" class="form-control" value="{{$categoria->nome}}" placeholder="Nome da categoria" name="nome" />
                                                  <input name="segmento_id" value="{{ $segmento->id }}" type="hidden" class="form-control" required/>
                                              </div>
                                              <input type="hidden" class="form-control" value="{{$categoria->id}}" name="categoria_id" hidden/>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                              <button type="submit" class="btn btn-success">Alterar</button>
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
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="box">
                  
                  <div class="box-header">
                    <h3 class="box-title"><a data-toggle="modal" data-target="#addProduto" class="btn btn-success">Adicionar produto</a></h3>

                    <div class="modal fade" id="addProduto" tabindex="-1" role="dialog" aria-labelledby="exemploModalCategoriaCadastrar" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exemploModalCategoriaCadastrar">Cadastro de novo produto</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form role="form" method="post" action="{{ route('admin.produtos.create') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="segmento_id" value="{{ $segmento->id }}" type="hidden" class="form-control" required/>
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" placeholder="Nome do produto" name="nome" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Selecione a categoria do produto</label>
                                        <select name="categoria_id" class="form-control" required>
                                            @foreach($segmento->categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
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

                                    

                                    <div class="form-group">
                                        <label>Preço de venda por unidade de venda do produto</label>
                                        <input type="text" name="preco" class="form-control money" placeholder="Preço" required name="nome" />
                                    </div>
                                </div>
                                <!-- /.box-body -->
                    
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success pull-right">Cadastrar Produto</button>
                                </div>
                            </form>
                          </div>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="20%">#</th>
                              <th width="10%">Nome</th>
                              <th width="40%">Descrição</th>
                              <th width="10%">Categoria</th>
                              <th width="10%">Preço</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($segmento->produtos as $key => $produto)
                              <tr>
                                  <td>
                                      <img src="{{ asset('storage/'.$produto->foto) }}" style="width: 150px;"/>
                                  </td>
                                  <td>{{ $produto->nome }}</td>
                                  <td>{{ $produto->descricao }}</td>
                                  <td>{{ $produto->categoria->categoria->nome }}</td>
                                  <td>R$ {{ $produto->preco }}</td>
                                  <td>
                                      <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalArquivarPro{{$key}}">Arquivar</a><br/>
                                      <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEditarPro{{$key}}">Editar</a><br/>
                                       @if($produto->destaque == true)
                                          <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalDestacar{{$key}}">Tirar de destaque</a>                                    
                                      @else
                                          <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#modalDestacar{{$key}}">Colocar em destaque</a>
                                      @endif
                                  </td>
                              </tr>

                              <!-- Modal ARQUIVAR -->
                              <div class="modal fade" id="modalArquivarPro{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exemploModalArquivar{{$key}}" aria-hidden="true">
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
                              <div class="modal fade" id="modalEditarPro{{$key}}" tabindex="-1" role="dialog" aria-labelledby="titulo_modal{{$key}}" aria-hidden="true">
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
                                                  <label>Selecione a categoria do produto</label>
                                                  <select name="categoria_id" class="form-control" required>
                                                      <option value="{{$produto->categoria->categoria->id}}">{{$produto->categoria->categoria->nome}}</option>
                                                      @foreach($categorias as $categoria)
                                                          @if($categoria->id != $produto->categoria->categoria_id)
                                                              <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                                          @endif
                                                      @endforeach
                                                  </select>
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

                               <!-- Modal DESTACAR -->
                              <div class="modal fade" id="modalDestacar{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exemploModalDestacar{{$key}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exemploModalDestacar{{$key}}">Destaque</h5>
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
              </div>
              <!-- /.tab-pane -->
            </div>
                @endif
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
<script type="text/javascript" src="{{asset('maskMoney/dist/jquery.maskMoney.min.js')}}"></script>
    <script>
        $(function() {
            $('.money').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
        })
    </script>
@endsection