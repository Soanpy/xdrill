<?php
/**
 * Created by PhpStorm.
 * User: Fonseca
 * Date: 21/08/2018
 * Time: 20:55
 */
?>
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
            Segmentos
            <small>cadastrados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.segmentos')}}"><i class="fa fa-cubes"></i> Segmentos</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                       {{-- <h3 class="box-title">Data Table With Full Features</h3>--}}
                        <a href="{{route('admin.segmento')}}" class="btn btn-lg btn-primary">Cadastrar</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($segmentos as $segmento)
                                <tr>
                                <td>{{$segmento->nome}}</td>
                                <td>@if($segmento->logo)<img style="width: 100px" src="{{asset('/storage')."/".$segmento->logo}}"/>@endif</td>
                                <td>{{$segmento->status}}</td>
                                <td>
                                    @if($segmento->status == "INATIVO")
                                    <a href="{{ route('admin.segmento.ativar',['segmento_id' => $segmento->id]) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> Ativar
                                    </a>
                                    @else
                                    <a href="{{ route('admin.segmento.desativar',['segmento_id' => $segmento->id]) }}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-eye-slash"></i> Desativar
                                    </a>
                                    @endif
                                    <a href="{{ route('admin.segmento',['segmento_id' => $segmento->id]) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('admin.segmento.apagar',['segmento_id' => $segmento->id]) }}" class="btn btn-sm btn-danger">
                                        <i class="fa  fa-times-circle"></i> Apagar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Logo</th>
                                <th>Imagem</th>
                                <th>Banner</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                            </tfoot>
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
    <!-- /.content -->

@endsection

@section('js')
    <!-- jQuery 3 -->
    <script src="{{asset('administrativo/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('administrativo/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('administrativo/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('administrativo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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
            $('#example1').DataTable();
        })
    </script>
@endsection