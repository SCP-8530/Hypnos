<div class="container">
    <div class="row justify-content-center custom-vh">
        <div class="col-lg-6">
            <form method="post" action="{{ route('horaires.store') }}">
                @csrf
                <div class="form-group">
                    <label for="lundi" class="form-label">Lundi :</label>
                    <input id="lundi" name="lundi" class="form-control" type="text" pattern="^(0|1){20}$" value="{{ old('lundi') }}">
                    @error('lundi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mardi" class="form-label">Mardi :</label>
                    <input id="mardi" name="mardi" class="form-control" type="text" pattern="^(0|1){20}$" value="{{ old('mardi') }}">
                    @error('mardi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mercredi" class="form-label">Mercredi :</label>
                    <input id="mercredi" name="mercredi" class="form-control" type="text" pattern="^(0|1){20}$" value="{{ old('mercredi') }}">
                    @error('mercredi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jeudi" class="form-label">Jeudi :</label>
                    <input id="jeudi" name="jeudi" class="form-control" type="text" pattern="^(0|1){20}$" value="{{ old('jeudi') }}">
                    @error('jeudi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="vendredi" class="form-label">Vendredi :</label>
                    <input id="vendredi" name="vendredi" class="form-control" type="text" pattern="^(0|1){20}$" value="{{ old('vendredi') }}">
                    @error('vendredi')
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
