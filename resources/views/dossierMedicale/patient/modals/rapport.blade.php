
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rediger un Rapport</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- <form action="{{route('rapportCreate')}}" method="post" id="r" > -->
      <form action="{{route('rapportCreate')}}" method="post" id="r" >
        @csrf

        <input id="idr" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $id }}" hidden>
        <input id="objetr" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ $objet }}" hidden>

        <div class="form-group row">
            <label for="titrer" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

            <div class="col-md-6">
                <input id="titrer" type="text" class="form-control{{ $errors->has('titreR') ? ' is-invalid' : '' }}" name="titreR" value="{{ old('titreR') }}" required>

                @if ($errors->has('titreR'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('titreR') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group row">
            <label for="descriptionr" class="col-md-4 col-form-label">{{ __('Rapport') }}</label>

            <div class="col-md-12">
                <!-- <textarea id="descriptionr" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} " name="description" value="{{ old('description') }}" required></textarea> -->
                <input id="descriptionr" type="hidden" name="content">
                <trix-editor input="descriptionr"></trix-editor>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>


            <!-- <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background : #827FFE;border-color: #fff;" >Confirmer</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- textEditorStart -->
<script src="{{asset('js/trix/trix.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
<!-- textEditorEnds -->