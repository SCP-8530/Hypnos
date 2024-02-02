<!-- @author Philippe Bertrand -->
<?php
$enseignants = \App\Models\Enseignant::all()->sortBy('id', descending: true)
?>

<div class="container">
    <div class="row justify-content-center align-items-center custom-vh">
        <div class="col-lg-6">
            <form method="post" action="{{ route('contraintes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom" class="form-label">Nom :</label>
                    <input id="nom" name="nom" class="form-control" type="text" value="{{@old('nom') ? @old('nom') : $contrainte->nom}}">
                    @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stricte" class="form-label">Niveau d'importance (stricte ou non) :</label>
                    <select id="stricte" name="stricte" class="form-control">
                        <option value="1" {{ old('stricte', $contrainte->stricte) == 1 ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('stricte', $contrainte->stricte) == 0 ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('stricte')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="enseignant" class="form-label">Enseignant associé :</label>
                    <select id="enseignant" name="enseignant" class="form-control">
                        <option value="">Sélectionnez un enseignant</option>
                        @foreach ($enseignants as $enseignant)
                            <option value="{{ $enseignant->id }}">{{ $enseignant->prenom }} {{ $enseignant->nom }}</option>
                        @endforeach
                    </select>
                    @error('enseignant')
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

