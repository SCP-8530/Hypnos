<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <div class="d-flex align-items-center p-2">
            <h1 class="h2 flex-grow-1">Fiche de cheminement</h1>
            @if (Gate::any(['admin','gestionnaire']))
                <a href="{{route("cheminements.edit", $cheminement->id)}}" class="btn btn-warning m-1">
                    <span class="btn-text">Modifier</span>
                    <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
                </a>
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
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Contraintes associées :</h3>
                @if ($cheminement->contraintes->count() > 0)
                <ul>
                    @foreach($cheminement->contraintes as $contrainte)
                        <li>{{ $contrainte->nom }}</li>
                    @endforeach
                </ul>
                @else
                    <p><strong>Aucune contrainte associé à ce cheminement</strong></p>
                @endif
            </div>
            <div class="col-md-6">
                <h3>Cours associés :</h3>
                <ul>
                    @foreach($cheminement->cours as $cours)
                        <li>{{ $cours->nom }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-4">
            @if(Gate::any(['admin']))
                <p class="mb-1"><strong>ID :</strong> {{$cheminement->id}}</p>
            @endif
            <p class="mb-1"><strong>Nom :</strong> {{$cheminement->nom}}</p>
            <p class="mb-1"><strong>Session :</strong> {{$cheminement->no_session}}</p>
            @if(Gate::any(['admin']))
                <p class="mb-1"><strong>ID de l'horaire :</strong> {{$cheminement->horaire?->id}}</p>
            @endif
        </div>

        <x-table-horaire :Horaire="$cheminement->horaire"></x-table-horaire>
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
                    <p>Voulez-vous vraiment supprimer le cheminement : <strong>{{$cheminement->nom}}</strong> session #<strong>{{$cheminement->no_session}}</strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('cheminements.destroy', $cheminement) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
