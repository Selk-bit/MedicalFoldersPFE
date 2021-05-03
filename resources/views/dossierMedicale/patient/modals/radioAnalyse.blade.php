<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Radio - Analayse a Faire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('CRA')}}" method="post" id="ra">
        <!-- <form id="ra"> -->
            @csrf
            <input id="idra" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $id }}" hidden>
            <input id="objetra" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ $objet }}" hidden>

            @if ($errors->has('id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id') }}</strong>
                </span>
            @endif

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                
                <div class="col-md-6">
                    <select id="typera" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" >    
                        <option value="0">Analyse</option>
                        <option value="1">Radio</option>
                    </select>
                    @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('titre') }}</label>

                <div class="col-md-6">
                    <input id="titrera" type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" value="{{ old('titre') }}" required>

                    @if ($errors->has('titre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('titre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Dsescription') }}</label>

                <div class="col-md-6">
                    <textarea id="descriptionra" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" ></textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    <!-- <input id="descriptionra" type="hidden" name="descriptionra"> -->
                    <!-- <trix-editor input="descriptionra"></trix-editor> -->
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
