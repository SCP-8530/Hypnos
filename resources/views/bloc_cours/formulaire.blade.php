<!-- @author Philippe Bertrand
 update @author Guillaume-->
<div class="container">
    @if(session('message_erreur'))
        <div class="alert alert-danger">{{session('message_erreur')}}</div>
    @endif
    <div class="form-group">
        <label for="jour" class="form-label">Jour de la semaine</label>
        <p class="star"></p>
        <select id="jour" name="jour" class="form-control">
            <option value="">Selectionnez une journée de la semaine</option>
            <option value="1">Lundi</option>
            <option value="2">Mardi</option>
            <option value="3">Mercredi</option>
            <option value="4">Jeudi</option>
            <option value="5">Vendredi</option>
        </select>
        @error('jour')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="heures" class="form-label">Heures</label>
        <p class="star"></p>
        <select id="heures" name="heures" class="form-control"></select>
        @error('heures')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="local_id" class="form-label">Local</label>
        <p class="star"></p>
        <select id="local_id" name="local_id" class="form-control">
            <?php $locals =\App\Models\Local::all() ?>
            @foreach($locals as $local)
                <option value="{{$local->id}}">{{$local->no_local}}</option>
            @endforeach
            @error('local_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </select>
    </div>
    <div class="form-group">
        <label for="groupe_cours_id" class="form-label">Groupe cours</label>
        <input id="groupe_cours_id" name="groupe_cours_id" class="form-control" readonly="readonly"/>
        @error('groupe_cours_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
