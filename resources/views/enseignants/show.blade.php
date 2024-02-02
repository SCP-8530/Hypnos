<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <div class="d-flex align-items-center p-2">
            <h1 class="h2 flex-grow-1">Fiche de professeur</h1>
            @if (Gate::any(['admin','gestionnaire']))
            <a href="{{route("enseignants.edit", $enseignant->id)}}" class="btn btn-warning m-1">
                <span class="btn-text">Modifier</span>
                <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#supprimerModal">
                <span class="btn-text">Supprimer</span>
                <span class="btn-icon d-none"><i class="fa fa-trash"></i></span>
            </button>
            @endif
        </div>
        @if (session('message'))
            <p class="alert alert-success">
                {{ session('message') }}
            </p>
        @endif
        <div class="d-flex justify-content-between p-2">
            @if(Gate::any(['admin']))
            <p> <b>ID :</b> {{$enseignant->id}}</p>
            @endif
            <p> <b>Nom :</b> {{$enseignant->nom}}</p>
            <p> <b>Prenom :</b> {{$enseignant->prenom}}</p>
            <p> <b>Bureau :</b> {{$enseignant->bureau}}</p>
            <p> <b>Poste :</b> {{$enseignant->poste}}</p>
            @if(Gate::any(['admin']))
            <p> <b>ID de l'horaire :</b> {{$enseignant->proprio?->id}}</p>
            @endif
            @if(Gate::any(['admin']))
                <p> <b>ID de l'Utilisateur :</b> {{$enseignant->user_proprio?->id}}</p>
            @endif
        </div>
        @if ($enseignant->contrainte->count() > 0)
            <h3>Contraintes associées :</h3>
            <ul>
                @foreach ($enseignant->contrainte as $contrainte)
                    <li>{{ $contrainte->nom }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucune contrainte associée à cet enseignant.</p>
        @endif
        <x-table-horaire :Horaire="$enseignant->proprio"></x-table-horaire>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprimerModalLabel">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé l'enseignant {{$enseignant->prenom}} {{$enseignant->nom}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('enseignants.destroy', $enseignant) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
