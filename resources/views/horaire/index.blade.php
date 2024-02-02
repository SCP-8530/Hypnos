<x-guest-layout>
    <div class="navbar d-flex">
        <h1 class="h1 flex-grow-1">Liste des horaires</h1>
        {{$objets->links()}}
        @if (Gate::any(['gestionnaire', 'admin']))
        <a href="{{route('horaire.create')}}" class="btn btn-primary m-2">Ajouter</a>
        @endif
        @if (session('message'))
            <p class="alert alert-success w-50 mt-4">
                {{ session('message') }}
            </p>
        @endif
    </div>
    <div class="row mb-5">
        {{-- Le nom objets vient du contrôleur --}}
        @foreach($objets as $horaire)
            <div class="card mx-2 mt-2">
                <div class="card-body">
                    <p class="h5 card-title">
                        @if(Gate::any(['admin']))
                        ( {{$horaire->id}} )
                        @endif
                        @foreach($e as $enseignant)
                            @if($enseignant->horaire_id == $horaire->id)
                            {{$enseignant->prenom}} {{$enseignant->nom}}
                            @endif
                        @endforeach
                        @foreach($l as $local)
                            @if($local->horaire_id == $horaire->id)
                                {{$local->no_local}}
                            @endif
                        @endforeach
                        @foreach($c as $cheminement)
                            @if($cheminement->horaire_id == $horaire->id)
                                {{$cheminement->nom}} session #{{$cheminement->no_session}}
                            @endif
                        @endforeach
                    </p>
                    <p class="card-text">Lundi : {{$horaire->lundi}}</p>
                    <p class="card-text">Mardi : {{$horaire->mardi}}</p>
                    <p class="card-text">Mercredi : {{$horaire->mercredi}}</p>
                    <p class="card-text">Jeudi : {{$horaire->jeudi}}</p>
                    <p class="card-text">Vendredi : {{$horaire->vendredi}}</p>
                    <a href="{{route('horaire.show', $horaire->id)}}" class="btn btn-outline-primary">
                        Afficher les details
                    </a>
                </div>
            </div>
        @endforeach

    </div>
</x-guest-layout>
