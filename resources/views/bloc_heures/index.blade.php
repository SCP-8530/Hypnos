<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <body>
    <div class="navbar">
        <h1 class="m-3 h1">Liste des blocs d'heures actuels : </h1>
        <a href="{{route('bloc_heures.create')}}" class="btn btn-outline-primary">Ajouter un bloc d'heures</a>
    </div>

    @if (session('message'))
        <p class="alert alert-success w-50">
            {{ session('message') }}
        </p>
    @endif
    <div class="container row">
        {{-- Le nom objets vient du contrôleur --}}
        @foreach($objets as $bloc_heures)
            <div class="card mx-2 mt-2" data-bs-toggle="modal" data-bs-target="#blocHeuresModal{{$bloc_heures->id}}">
                <div class="card-body">
                    <h2 class="card-title h3">ID : {{$bloc_heures->id}}</h2>
                    <p class="card-text">Jour : {{$bloc_heures->jour}}</p>
                    <p class="card-text heures-binaire">Heures : {{$bloc_heures->heures}}</p>
                </div>
            </div>
            <div class="modal fade" id="blocHeuresModal{{$bloc_heures->id}}" tabindex="-1" aria-labelledby="blocHeuresModalLabel{{$bloc_heures->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="blocHeuresModalLabel{{$bloc_heures->id}}">Détails du bloc d'heures #{{$bloc_heures->id}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <h2>ID : {{$bloc_heures->id}}</h2>
                            <p>Jour : {{$bloc_heures->jour}}</p>
                            <p>Heures : {{$bloc_heures->heures}}</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('bloc_heures.edit', $bloc_heures->id)}}" class="btn btn-warning">Modifier</a>
                            <form action="{{route('bloc_heures.destroy', $bloc_heures->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </body>
</x-guest-layout>
