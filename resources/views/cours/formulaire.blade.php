<!-- @author Philippe Bertrand -->
<?php
    $cheminements = \App\Models\Cheminements::all()
?>

<div class="container">
    <div class="row justify-content-center custom-vh">
        <div class="col-lg-6">
            <form method="post" action="{{ route('cours.store') }}">
                @csrf
                <div class="form-group">
                    <label for="code" class="form-label">Code :</label>
                    <input id="code" name="code" class="form-control" type="text" minlength="2" value="{{@old('code') ? @old('code') : $cours->code}}">
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nom" class="form-label">Nom :</label>
                    <input id="nom" name="nom" class="form-control" type="text" value="{{@old('nom') ? @old('nom') : $cours->nom}}">
                    @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ponderation" class="form-label">Pondération du cours :</label>
                    <input id="ponderation" name="ponderation" class="form-control" type="text" value="{{@old('ponderation') ? @old('ponderation') : $cours->ponderation}}">
                    @error('ponderation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bloc" class="form-label">Bloc :</label>
                    <input id="bloc" name="bloc" class="form-control" type="text" value="{{@old('bloc') ? @old('bloc') : $cours->bloc}}">
                    @error('bloc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cheminement" class="form-label">Cheminement :</label>
                    <select id="cheminement" multiple name="cheminement[]" class="form-control chosen-select" data-placeholder="Ajouter au moins un cheminement">
                        @foreach($cheminements as $cheminement)
                            <option value="{{ $cheminement->id }}">{{ $cheminement->nom }} session #{{ $cheminement->no_session }}</option>
                        @endforeach
                    </select>
                    @error('cheminement')
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
