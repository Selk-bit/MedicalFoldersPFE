<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Redirection vers an autre Medecin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{route('CR')}}" method="POST" id="re">
        {{-- CR means ceate redirection --}}
        @csrf

        <input id="idre" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $id }}" hidden>
        <input id="objetre" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ $objet }}" hidden>

        <div class="form-group row">
            <label for="Specialite" class="col-md-4 col-form-label text-md-right">{{ __('Specialite') }}</label>
            
            <div class="col-md-6">
                <select id="Specialitere" class="form-control{{ $errors->has('Specialite') ? ' is-invalid' : '' }}" name="Specialite" value="{{ old('Specialite') }}" >    
                  @foreach ($Specialite as $Specialite)
                    <option value="{{ $Specialite->id }}">{{ $Specialite->nom }}</option>
                  @endforeach
                </select>
                @if ($errors->has('Specialite'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Specialite') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <textarea  id="descriptionre" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" ></textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" style="background : #827FFE; border-color: #fff;" >Confirmer</button>
      </div>
    </form>     
      </div>
    </div>
  </div>
</div>
