<form action="{{route('update.well.data')}}" method="POST">
    @csrf
    <div class="modal-body">
      <div class="form-group">
          <label for="profundidade">Depth</label>
          <input id="profundidade" type="text" name="depth" value="{{$data->depth}}" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="rop">ROP</label>
          <input id="rop" type="text" name="rop" value="{{$data->rop}}" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="rpm">RPM</label>
          <input id="rpm" type="text" name="rpm" value="{{$data->rpm}}" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="wob">WOB</label>
          <input id="wob" type="text" name="wob" value="{{$data->wob}}" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="tflo">TFLO</label>
          <input id="tflo" type="text" name="tflo" value="{{$data->tflo}}" class="form-control" required>
      </div>
    </div>
    <input type="hidden" name="data_id" hidden value="{{$data->id}}">
    <div class="modal-footer">
        <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Change</button>
    </div>
</form>

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
<!--Importação da máscara de input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('administrativo/dist/js/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('maskMoney/dist/jquery.maskMoney.min.js')}}"></script>
<script>
    $(function() {
        $('.money').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
    })
</script>