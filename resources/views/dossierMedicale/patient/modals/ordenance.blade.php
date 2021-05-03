<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe4" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabe4">Ordenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="{{route('COMME')}}" method="POST" id="o">
        {{-- COMME CEATION D ORDONNANCE MEDICAL ET MODE D EMPLOI --}}
            @csrf
    
            <input id="ido" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $id }}" hidden>
            <input id="objeto" type="text" class="form-control{{ $errors->has('objet') ? ' is-invalid' : '' }}" name="objet" value="{{ $objet }}" hidden>

            <div class="form-group row">
                <label for="medicamentsModeEmploi" class="col-md-4 col-form-label ">Medicaments et Mode d'Emploi</label>

                <div class="col-md-12">
                    <textarea  id="medicamentsModeEmploio" type="text" class="form-control{{ $errors->has('medicamentsModeEmploi') ? ' is-invalid' : '' }}" name="medicamentsModeEmploi" value="{{ old('medicamentsModeEmploi') }}" ></textarea>
                    <!-- <input id="medicamentsModeEmploio" type="hidden" name="content">
                    <trix-editor input="medicamentsModeEmploio"></trix-editor> -->
                    @if ($errors->has('medicamentsModeEmploi'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('medicamentsModeEmploi') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background : #827FFE;border-color: #fff;" >Confirmer</button>
            </div>
    </form>


      </div>
    </div>
  </div>
</div>
