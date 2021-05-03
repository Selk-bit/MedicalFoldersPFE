<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe5" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabe5">Envoyer Un Conseil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @csrf

        <input id="idconseil" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $id }}" hidden>
        <input id="objetconseil" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ $objet }}" hidden>

        <div class="form-group row">
                <label for="conseil" class="col-md-4 col-form-label ">{{ __('Conseil') }}</label>

                <div class="col-md-12">
                    <!-- <textarea  id="conseilconseil" type="text" class="form-control{{ $errors->has('conseil') ? ' is-invalid' : '' }}" name="conseil" value="{{ old('conseil') }}" ></textarea>
                    @if ($errors->has('conseil'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('conseil') }}</strong>
                        </span>
                    @endif -->
                    <button class="btn btn-primary" id="startRecordingButton">Start recording</button>
                    <button class="btn btn-secondary" id="stopRecordingButton">Stop recording</button>
                    <button class="btn btn-secondary" id="playButton">Play</button>
                    <button class="btn btn-success" id="downloadButton">Upload</button>
                    <button class="btn btn-danger" id="resetButton">ReSet</button>
                </div>
        </div>

            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Valide</button>
            </div> -->
    <!-- </form> -->


      </div>
    </div>
  </div>
</div>