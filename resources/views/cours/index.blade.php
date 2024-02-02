<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <div class="navbar">
            <h1 class="m-3 h1">Liste des cours : </h1>
            @if (Gate::any(['gestionnaire', 'admin']))
                <a href="{{route('cours.create')}}" class="btn btn-outline-primary">Ajouter</a>
            @endif
            {{$objets->links()}}
        </div>
        @if (session('message'))
            <p class="alert alert-success w-50 mt-4">
                {{ session('message') }}
            </p>
        @endif
        <div class="row mb-5">
            {{-- Le nom objets vient du contrôleur --}}
            @foreach($objets as $cours)
                <div class="card mx-2 mt-2 c5">
                    <div class="card-body">
                        @if(Gate::any(['admin']))
                            <p class="card-title h5"> Cours  #{{$cours->id}}</p>
                        @endif
                        <p class="card-text"> Code: {{$cours->code}} </p>
                        <p class="card-text"> Nom : {{$cours->nom}} </p>
                        @if (Gate::any(['gestionnaire', 'admin']))
                        <a href="{{route('cours.show', $cours->id)}}" class="btn btn-outline-primary">Plus de details</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
