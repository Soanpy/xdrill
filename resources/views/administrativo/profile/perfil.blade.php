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
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Personal Data</a></li>
              <li><a href="#timeline" data-toggle="tab">Update Password</a></li>
              <li><a href="#address" data-toggle="tab">Address</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="activity">
                
                <form class="form-horizontal" method="post" action="{{ route('user.update.data') }}">
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

              <div class="tab-pane" id="timeline">
                <form class="form-horizontal" method="post" action="{{ route('user.update.password') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Old password</label>

                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="old_password" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNewPassword" class="col-sm-2 control-label">New Password</label>

                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="new_password" placeholder="**********">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10">
                        <input type="password" class="form-control" name="confirm_password" placeholder="**********">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 ">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </div>
                </form>

              </div>
              <!-- /.tab-pane -->


              <div class="tab-pane" id="address">
                  <form class="form-horizontal" method="post" action="{{ route('user.update.address') }}">
                      @csrf
                      <div class="form-group">
                          <label for="inputaAddress" class="col-sm-2 control-label">Address</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" placeholder="Address" value="{{Auth::user()->street}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputaNumber" class="col-sm-2 control-label">Number</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="number" placeholder="Number" value="{{Auth::user()->number}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputaComplement" class="col-sm-2 control-label">Complement</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="complement" placeholder="Complement" value="{{Auth::user()->complement}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputaDistrict" class="col-sm-2 control-label">District</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="district" placeholder="District" value="{{Auth::user()->district}}">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="inputaCity" class="col-sm-2 control-label">City</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="city" placeholder="City" value="{{Auth::user()->city}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputaState" class="col-sm-2 control-label">State</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="state" placeholder="State" value="{{Auth::user()->state}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputaCountry" class="col-sm-2 control-label">Country</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="country" placeholder="Country" value="{{Auth::user()->country}}">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="inputaZip" class="col-sm-2 control-label">Zip</label>
  
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="zip" placeholder="Zip code" value="{{Auth::user()->zip}}">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 ">
                          <button type="submit" class="btn btn-primary pull-right">Update</button>
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