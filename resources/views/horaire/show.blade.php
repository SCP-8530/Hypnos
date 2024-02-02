<x-guest-layout>
    <div class="container">
        <div class="d-flex align-items-center">
            <h1 class="h2 p-2 flex-grow-1">ID: {{$horaire->id}}</h1>
            <!--bouton-->
            @if (Gate::any(['gestionnaire', 'admin']))
                <a href="{{route("horaire.edit", $horaire->id)}}" class="btn btn-warning m-1">
                    <span class="btn-text">Modifier</span>
                    <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
                </a>
                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#supprimerModal">
                    <span class="btn-text">Supprimer</span>
                    <span class="btn-icon d-none"><i class="fa fa-trash"></i></span>
                </button>
            @endif
            @if (session('message'))
                <p class="alert alert-success w-50 mt-4">
                    {{ session('message') }}
                </p>
            @endif
        </div>
        <x-table-horaire :Horaire="$horaire"></x-table-horaire>
    </div>
    <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprimerModalLabel">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé l'horaire {{$horaire->id}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('horaires.destroy', $horaire) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


