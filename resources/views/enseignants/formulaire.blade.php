<!-- @author Philippe Bertrand -->
<div class="container">
    <div class="row justify-content-center align-items-center custom-vh">
        <div class="col-lg-6">
            <form method="post" action="{{ route('enseignants.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom" class="form-label">Nom :</label>
                    <input id="nom" name="nom" class="form-control" type="text"
                           value="{{ old('nom', $enseignant->nom) }}">
                    @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input id="prenom" name="prenom" class="form-control" type="text"
                           value="{{ old('prenom', $enseignant->prenom) }}">
                    @error('prenom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bureau" class="form-label">Bureau :</label>
                    <input id="bureau" name="bureau" class="form-control" type="text"
                           value="{{ old('bureau', $enseignant->bureau) }}">
                    @error('bureau')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poste" class="form-label">Poste :</label>
                    <input id="poste" name="poste" class="form-control" type="number"
                           placeholder="Doit contenir 4 chiffres"
                           value="{{ old('poste', $enseignant->poste) }}">
                    @error('poste')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id" class="form-label">Lien avec un utilisateur :</label>
                    <select id="user_id" name="user_id" class="form-control">
                        @if ($enseignant->user_id != null)
                            <option selected value="{{ $enseignant->user_id }}">
                                {{ $enseignant->user_proprio->name }}</option>
                            <option value="">...</option>
                        @else
                            <option selected value="">...</option>
                        @endif
                            <?php $users = \App\Models\User::all(); ?>
                        @foreach ($users as $user)
                            @if ($user->prof == 1)
                                @if ($user->enseignant == null)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary mt-3">{{ $texteBouton }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
