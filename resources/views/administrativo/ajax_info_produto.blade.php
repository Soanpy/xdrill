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
