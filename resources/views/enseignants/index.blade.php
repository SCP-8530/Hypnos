<!-- @author Philippe Bertrand -->
<x-guest-layout>
<div class="container">
    <div class="navbar">
        <h1 class="m-3 h1">Liste des enseignants : </h1>
        @if (Gate::any(['gestionnaire', 'admin']))
        <a href="{{route('enseignants.create')}}" class="btn btn-outline-primary">Ajouter</a>
        @endif
    </div>
    @if (session('message'))
        <p class="alert alert-success w-50 mt-4">
            {{ session('message') }}
        </p>
    @endif
    <div class="row mb-5">
        {{-- Le nom objets vient du contrôleur --}}
        @foreach($objets as $enseignant)
            <div class="card mx-2 mt-2 c5">
                <div class="card-body">
                    @if(Gate::any(['admin']))
                    <p class="card-title h5"> Enseignant {{$enseignant->id}}</p>
                    @endif
                    <p class="card-text"><strong>Nom : </strong>{{$enseignant->nom}} </p>
                    <p class="card-text"><strong>Prénom : </strong>{{$enseignant->prenom}} </p>
                    <p class="card-text"><strong>Poste : </strong>{{$enseignant->poste}} </p>
                    <a href="{{route('enseignants.show', $enseignant->id)}}" class="btn btn-outline-primary">Plus de details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-guest-layout>

