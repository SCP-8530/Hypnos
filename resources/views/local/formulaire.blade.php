<div class="container">
    <div class="row justify-content-center custom-vh">
        <div class="col-lg-6">
            <form method="post" action="{{ route('locaux.store') }}">
                @csrf
                <div class="form-group">
                    <label for="no_local" class="form-label">Numéro du local :</label>
                    <input id="no_local" name="no_local" class="form-control" type="text" minlength="2" value="{{ old('no_local') }}">
                    @error('no_local')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="capacite" class="form-label">Capacité du local :</label>
                    <input id="capacite" name="capacite" class="form-control" type="number" value="{{ old('capacite') }}">
                    @error('capacite')
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
