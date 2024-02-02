<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <div class="navbar">
            <h1 class="m-3 h1">Liste des cheminements : </h1>
            @if (Gate::any(['gestionnaire', 'admin']))
                <a href="{{route('cheminements.create')}}" class="btn btn-outline-primary">Ajouter</a>
            @endif
        </div>
        @if (session('message'))
            <p class="alert alert-success w-50 mt-4">
                {{ session('message') }}
            </p>
        @endif
        <div class="row mb-5">
            {{-- Le nom objets vient du contrôleur --}}
            @foreach($cheminements as $cheminement)
                <div class="card mx-2 mt-2 c5">
                    <div class="card-body">
                        @if(Gate::any(['admin']))
                            <p class="card-title h5"> Cheminement {{$cheminement->id}}</p>
                        @endif
                        <p class="card-text"> Nom: {{$cheminement->nom}} </p>
                        <p class="card-text"> Session : {{$cheminement->no_session}} </p>
                        <a href="{{route('cheminements.show', $cheminement->id)}}" class="btn btn-outline-primary">Plus de details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
