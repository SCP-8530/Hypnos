<!-- @author Philippe Bertrand -->
<x-guest-layout>

    <div class="navbar">
        <h1 class="m-3 h2">Liste des blocs de cours actuels : </h1>
        <a href="{{route('bloc_cours.create')}}" class="btn btn-primary">Ajouter un bloc de cours</a>
    </div>

    @if (session('message'))
        <p class="alert alert-success w-50">
            {{ session('message') }}
        </p>
    @endif
    <div class="container row">
        {{-- Le nom objets vient du contrôleur --}}
        @foreach($objets as $bloc_cours)
            <div class="card mx-2 mt-2 c2" data-bs-toggle="modal" data-bs-target="#blocCoursModal{{$bloc_cours->id}}">
                <div class="card-body">
                    <h2 class="card-title h3">ID : {{$bloc_cours->id}}</h2>
                    <p class="card-text">Jour : {{$bloc_cours->jour}}</p>
                    <p class="card-text">Heures : {{$bloc_cours->heures}}</p>
                </div>
            </div>

            <div class="modal fade" id="blocCoursModal{{$bloc_cours->id}}" tabindex="-1" aria-labelledby="blocCoursModalLabel{{$bloc_cours->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="blocCoursModalLabel{{$bloc_cours->id}}">Détails du bloc de cours {{$bloc_cours->id}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <h2>ID : {{$bloc_cours->id}}</h2>
                            <p>Jour : {{$bloc_cours->jour}}</p>
                            <p>Heures : {{$bloc_cours->heures}}</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('bloc_cours.edit', $bloc_cours->id)}}" class="btn btn-warning">Modifier</a>
                            <form action="{{route('bloc_cours.destroy', $bloc_cours->id)}}" method="POST" class="d-inline">
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

</x-guest-layout>
