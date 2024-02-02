<!-- @author Philippe Bertrand -->
<?php
$cours = \App\Models\Cours::all();
?>
<div class="container">
    <div class="row justify-content-center custom-vh">
        <div class="col-lg-8">
            <form method="post" action="{{ route('cheminements.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom" class="form-label">Nom :</label>
                    <p class="star"></p>
                    <input id="nom" name="nom" class="form-control" type="text" value="{{@old('nom') ? @old('nom') : $cheminement->nom}}">
                    @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_session" class="form-label">Session :</label>
                    <p class="star"></p>
                    <input id="no_session" name="no_session" class="form-control" type="number" value="{{@old('no_session') ? @old('no_session') : $cheminement->no_session}}">
                    @error('no_session')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cours" class="form-label">Cours associés :</label>
                    <p class="star"></p>
                    <select id="cours" multiple name="cours[]" class="form-control chosen-select" data-placeholder="Ajouter au moins un cours">
                        @foreach($cours as $cour)
                            <option value="{{ $cour->id }}">{{ $cour->nom }}</option>
                        @endforeach
                    </select>
                    @error('cours')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary mt-3">{{ $texteBouton }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

