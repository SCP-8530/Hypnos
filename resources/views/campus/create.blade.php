<x-guest-layout>
    <h1 class="h2">Nouveau campus !</h1>
    <form method="post" action="{{route('campus.store')}}">
        @csrf
        <div class="my-3">
            <label for="nom" class="form-label">Nom</label>
            <p class="star">*</p>
            <input id="nom" name="nom" class="form-control" type="text" minlength="2" maxlength="50">
            <!--Validation cote client-->
            @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
    </form>
</x-guest-layout>
