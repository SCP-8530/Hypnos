<x-guest-layout>
    <div class="container">
        <h1 class="text-center"> Local #{{$local->id}}</h1>
        @if (session('message'))
            <p class="alert alert-success">
                {{ session('message') }}
            </p>
        @endif
        <ul>
            <li class="card-text">Numéro du local : {{$local->no_local}}</li>
            <li class="card-text">Capacité : {{$local->capacite}}</li>
            @if (Gate::any(['gestionnaire', 'admin']))
            <li class="card-text">Horaire ID: {{$local->proprio?->id}}</li>
            @endif
        </ul>
        @if (Gate::any(['gestionnaire', 'admin']))
            <a href="{{route("local.edit", $local->id)}}" class="btn btn-warning">
                <span class="btn-text">Modifier</span>
                <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerModal">
                <span class="btn-text">Supprimer</span>
                <span class="btn-icon d-none"><i class="fa fa-trash"></i></span>
            </button>
        @endif
        <h3 class="text-center mt-4"> Horaire du local {{$local->no_local}}</h3>
        <x-table-horaire :Horaire="$local->proprio"></x-table-horaire>
    </div>
    <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprimerModalLabel">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé le local #{{$local->no_local}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('local.destroy', $local) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


