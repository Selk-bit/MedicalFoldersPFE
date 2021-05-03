<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Controle - Consultation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            </form>
            <form action="{{route('CCC')}}" method="POST" id="cccform">
            <!-- <form  id="cccform"> -->
            @csrf
            <input id="idccc" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $id }}" hidden>
            <input id="objetccc" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ $objet }}" hidden>

            <div class="row">
                <label for="Specialite" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                <div class="col-md-6">
                    <select id="typeccc" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}">    
                        <option value="0">Controle</option>
                        <option value="1">Consultation</option>
                    </select>
                    @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="newDate" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                <div class="col-md-6">  
                    <input id="newDateccc" type="date" class="form-control{{ $errors->has('newDate') ? ' is-invalid' : '' }}" name="newDate" value="{{ old('newDate') }}" min="{{date('Y-m-d')}}" required>
                    @if ($errors->has('newDate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('newDate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background : #827FFE; border-color: #fff;">Confirmer</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>
