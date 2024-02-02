<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="h2">Nouveau groupe cours</h1>
    <form method="post" action="{{route('sessions.store')}}">
        @csrf
        <div class="form-group">
            <label for="annee" class="form-label">Année :</label>
            <p class="star"></p>
            <input id="annee" name="annee" class="form-control" type="number" min="2022" value="2022">
            @error('annee')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="saison" class="form-label">Session :</label>
            <p class="star"></p>
            <select id="saison" name="saison" class="form-control">
                <option value="Automne">Automne</option>
                <option value="Été">Été</option>
                <option value="Hiver">Hiver</option>
            </select>
            @error('saison')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
</x-guest-layout>
