<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <h1 class="h1">Information sur le bloc d'heures #{{$bloc_heures->id}}</h1>
        <ul>
            <li>{{$bloc_heures->jour}}</li>
            <li>{{$bloc_heures->heures}}</li>
        </ul>
    </div>

    <a href="{{route("bloc_heures.edit", $bloc_heures->id)}}" class="btn btn-warning">
        <span class="btn-text">Modifier</span>
        <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
    </a>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerModal">
        <span class="btn-text">Supprimer</span>
        <span class="btn-icon d-none"><i class="fa fa-trash"></i></span>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprimerModalLabel">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé le bloc d'heures #{{$bloc_heures->id}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('bloc_heures.destroy', $bloc_heures) }}">
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
