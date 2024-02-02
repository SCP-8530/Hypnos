<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <h1 class="h1">Information sur le bloc de cours #{{$bloc_cours->id}}</h1>
        <ul class="card card-body c3">
            <li class="card-text">Jour: {{$bloc_cours->jour}}</li>
            <li class="card-text">Heures: {{$bloc_cours->heures}}</li>
        </ul>
    </div>
    <a href="{{route("bloc_cours.edit", $bloc_cours->id)}}" class="btn btn-warning btn-modifier">
        <span class="btn-text">Modifier</span>
        <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
    </a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalSupprimer">
        <span class="btn-text">Supprimer</span>
        <span class="btn-icon d-none"><i class="fa fa-trash"></i></span>
    </button>


    <!-- Modal -->
    <div class="modal fade" id="modalSupprimer" tabindex="-1" aria-labelledby="modalSupprimerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSupprimerLabel">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé le bloc de cours #{{$bloc_cours->id}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('bloc_cours.destroy', $bloc_cours) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('message'))
        <p class="alert alert-success">
            {{ session('message') }}
        </p>
    @endif
</x-guest-layout>
