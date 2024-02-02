<!-- @author Philippe Bertrand -->
<?php
$contraintes = \App\Models\Contrainte::all()->sortBy('id', descending: true);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 custom-vh">
            <form method="post" action="{{ route('bloc_heures.store') }}">
                @csrf

                <div class="form-group">
                    <label for="jour" class="form-label">Jour de la semaine</label>
                    <input id="jour" name="jour" class="form-control" type="number" min="1" max="5" placeholder="Ex: Vendredi = 5" value="{{ old('jour') }}">
                    @error('jour')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="heures" class="form-label">Heures</label>
                    <input id="heures" name="heures" class="form-control" type="text" placeholder="Séparation de 20 blocs de 30 min" value="{{ old('heures') }}">
                    @error('heures')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contrainte" class="form-label">Association à une contrainte</label>
                    <select id="contrainte" name="contrainte" class="form-control">
                        <option value="">Sélectionnez une contrainte</option>
                        @foreach ($contraintes as $contrainte)
                            <option value="{{ $contrainte->id }}">{{ $contrainte->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
