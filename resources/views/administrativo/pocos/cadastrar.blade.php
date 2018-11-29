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
            Register Form
            {{-- <small>Preview</small> --}}
        </h1>
        <ol class="breadcrumb">
            {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> --}}
            <li class="active"><a href="#">Register Well</a></li>
            {{-- <li class="active">General Elements</li> --}}
        </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Register new well</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('register.well')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="wellTitle">*Title</label>
                                <input type="text" required name="title" class="form-control" id="wellTitle" placeholder="Well title">
                            </div>
                            <div class="form-group">
                                <label for="wellName">*Name</label>
                                <input type="text" required name="name" class="form-control" id="wellName" placeholder="Well name">
                            </div>
                            <div class="form-group">
                                <label for="wellDescription">*Description</label>
                                <textarea name="description" required id="wellDescription" class="form-control" cols="30" rows="10" placeholder="Write something describing the new well being registered"></textarea>
                                {{-- <input type="text" class="form-control" id="descricaoPoco" placeholder="Descricao"> --}}
                            </div>
                            <div class="form-group">
                                <label for="">Empresa</label>
                                <input type="text" class="form-control" disabled placeholder="{{Auth::user()->company?Auth::user()->company->name:'No company'}}">
                            </div>
                            <div class="form-group">
                                <label for="continentName">Continent</label>
                                <select name="continent_id" class="form-control" id="continents">
                                        <option value="">Select the continent</option>
                                    @foreach($continents as $continent)
                                        <option value="{{$continent->id}}">{{$continent->name}}</option>
                                    @endforeach
                                </select>
                            </div><div class="form-group">
                                <label for="countryName">Country</label>
                                <select name="country_id" class="form-control" id="countries">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zoneName">Zone</label>
                                <select name="zone_id" class="form-control" id="zones">
                                    <option value=""></option>
                                </select>
                                <p>Don't have a zone? <a href="{{route('create.zone')}}">Create one</a></p>
                            </div>
                            {{-- <div class="form-group">
                                <label for="wellPhoto">Representative photo</label>
                                <input type="file" id="wellPhoto">
                
                                <p class="help-block">Example block-level help text here.</p>
                            </div> --}}
                            {{-- <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Check me out
                                </label>
                            </div> --}}
                        </div>
                        <!-- /.box-body -->
        
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
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

<script type="text/javascript">
    $('#continents').on('change', function(e){
        var continent_id = e.target.value;
        $.get("{{route('json.countries')}}?continent_id="+continent_id ,function(data) {
            $('#countries').empty();
            $('#zones').empty();            
            $('#countries').append('<option value="0" disable="true" selected="true">Select the country</option>');
        
            $.each(data, function(index, countries){
                $('#countries').append('<option value="'+ countries.id +'">'+ countries.name +'</option>');
            });
        });

    });
    $('#countries').on('change', function(e){
        var country_id = e.target.value;
        $.get("{{route('json.zones')}}?country_id="+country_id ,function(data) {
            $('#zones').empty();
            $('#zones').append('<option value="0" disable="true" selected="true">Select the zone</option>');
        
            $.each(data, function(index, zones){
                $('#zones').append('<option value="'+ zones.id +'">'+ zones.name +'</option>');
            });
        });
    });
</script>
@endsection