<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Nouveau Dossier Medicale') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('CreateCDM') }}" >
                        @csrf

                            <div class="col-md-6">
                                <input id="id_p" type="number" class="form-control{{ $errors->has('id_p') ? ' is-invalid' : '' }}" name="id_p" value="{{ $id_p }}" hidden>

                                @if ($errors->has('id_p'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_p') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Objet" class="col-md-4 col-form-label text-md-right">{{ __('Objet') }}</label>

                            <div class="col-md-6">
                                <input id="objet" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ old('objet') }}" required autofocus>

                                @if ($errors->has('objet'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('objet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Creer Dossier') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('langagues')