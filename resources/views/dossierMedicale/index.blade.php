<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="card-body">
    <form method="POST" action="{{ route('dossierMedical') }}" >
        @csrf
        
        <div class="form-group row">
            <label for="inp" class="col-md-4 col-form-label text-md-right">{{ __('Objet') }}</label>

            <div class="col-md-6">
                <input id="objet" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ old('objet') }}" required autofocus>

                @if ($errors->has('objet'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('objet') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="dateDebut" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'Overture') }}</label>

            <div class="col-md-6">
                <input id="dateDebut" type="date" class="form-control{{ $errors->has('dateDebut') ? ' is-invalid' : '' }}" name="dateDebut" value="{{ old('dateDebut') }}" required autofocus>

                @if ($errors->has('dateDebut'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dateDebut') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            </div>
        </div>
    </form>
