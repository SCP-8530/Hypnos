<?php
    $campus_liste = \App\Models\Campus::all();
    $enseignants = \App\Models\Enseignant::all();
    $cours_liste = \App\Models\Cours::all()->sortBy("nom");
    $sessions = \App\Models\Session::all()->sortBy('id', descending: true);
?>

<div class="container">
    <div class="form-group">
        <label for="no_groupe" class="form-label">Numéro de groupe :</label>
        <p class="star"></p>
        <input id="no_groupe" name="no_groupe" class="form-control" type="number" value="{{@old('no_groupe') ? @old('no_groupe') : $groupeCours->no_groupe}}">
        @error('no_groupe')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nb_etudiants" class="form-label">Nombres d'étudiants :</label>
        <p class="star"></p>
        <input id="nb_etudiants" name="nb_etudiants" class="form-control" type="number" min="1" value="{{@old('no_groupe') ? @old('no_groupe') : $groupeCours->no_groupe}}">
        @error('nb_etudiants')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="campus_id" class="form-label">Campus :</label>
        <p class="star"></p>
        <select id="campus_id" name="campus_id" class="form-control" title="test">
            @if($groupeCours->campus_id != null)
                <option selected value="{{$groupeCours->campus_id}}">{{$groupeCours->proprioCampus->nom}}</option>
            @else
                <option selected value="">...</option>
            @endif
            @foreach($campus_liste as $campus)
                @if($campus->nom != "Poudlard")
                        <option value="{{$campus->id}}">{{$campus->nom}}</option>
                @endif
            @endforeach
        </select>
        @error('campus_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="session_id" class="form-label">Session :</label>
        <p class="star"></p>
        <select id="session_id" name="session_id" class="form-control">
            @if($groupeCours->session_id != null)
                <option selected value="{{$groupeCours->session_id}}">
                    {{$groupeCours->proprioSession->session}} {{$groupeCours->proprioSession->annee}}
                </option>
            @endif
            @foreach($sessions as $session)
                <option value="{{$session->id}}">
                    {{$session->session}} {{$session->annee}}
                </option>
            @endforeach
        </select>
        @error('session_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <!--
        https://stackoverflow.com/questions/30190588/html-select-multiple-as-dropdown
        https://harvesthq.github.io/chosen/
    -->
    <div class="form-group">
        <label for="enseignant" class="form-label">Enseignant :</label>
        <p class="star"></p>
        <select id="enseignant" multiple name="enseignant[]" class="form-control chosen-select" data-placeholder="Ajouter au moins un prof">
            @foreach($enseignants as $enseignant)
                <option value="{{$enseignant->id}}">{{$enseignant->prenom}} {{$enseignant->nom}}</option>
            @endforeach
        </select>
        @error('enseignant')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="cours_id" class="form-label">Cours :</label>
        <p class="star"></p>
        <select id="cours_id" name="cours_id" class="form-control">
            @if($groupeCours->cours_id != null)
                <option selected value="{{$groupeCours->cours_id}}">{{$groupeCours->proprioCours->nom}} ({{$groupeCours->proprioCours->code}})</option>
            @else
                <option selected value="">...</option>
            @endif
            @foreach($cours_liste as $cours)
                <option value="{{$cours->id}}">{{$cours->nom}} ({{$cours->code}})</option>
            @endforeach
        </select>
        @error('cours_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-outline-primary mt-3">{{$texteBouton}}</button>
</div>
