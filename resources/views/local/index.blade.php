<x-guest-layout>
    <div class="navbar">
        <h1 class="h1">Liste des locaux</h1>
        @if (Gate::any(['gestionnaire', 'admin']))
            <a href="{{route('local.create')}}" class="btn btn-outline-primary">Ajouter</a>
        @endif
    </div>
    @if (session('message'))
        <p class="alert alert-success">
            {{ session('message') }}
        </p>
    @endif
    <div class="row mb-5">
        {{-- Le nom objets vient du contrôleur --}}
        @foreach($objets as $local)
            <div class="card mx-2 mt-2 c2">
                <div class="card-body">
                    <p class="h5 card-title">{{$local->id}}</p>
                    <p class="card-text">Numéro local : {{$local->no_local}}</p>
                    <p class="card-text">Capacité : {{$local->capacite}}</p>
                    <a href="{{route('local.show', $local->id)}}" class="btn btn-outline-primary">
                        Afficher les détails
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
