<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="my-4">
                    <h1 class="display-4 text-center">Information sur le cours</h1>
                </div>
                @if (Gate::any(['gestionnaire', 'admin']))
                    <a href="{{route("cours.edit", $cours->id)}}" class="btn btn-warning m-1">
                        <span class="btn-text">Modifier</span>
                        <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
                    </a>
                    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#supprimerModal">
                        <span class="btn-text">Supprimer</span>
                        <span class="btn-icon d-none"><i class="fa fa-trash"></i></span>
                    </button>
                @endif
                <div class="bg-light p-4 rounded">
                    @if(Gate::any(['admin']))
                        <div class="mb-3">
                            <h5 class="fw-bold">ID :</h5>
                            <p class="lead">{{$cours->id}}</p>
                        </div>
                    @endif
                    <div class="mb-3">
                        <h5 class="fw-bold">Code :</h5>
                        <p class="lead">{{$cours->code}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Nom :</h5>
                        <p class="lead">{{$cours->nom}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Bureau :</h5>
                        <p class="lead">{{$cours->ponderation}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-bold">Poste :</h5>
                        <p class="lead">{{$cours->bloc}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="my-4">
                    <h2 class="display-4 text-center">Cheminements associés</h2>
                </div>
                <div class="bg-light p-4 rounded">
                    <ul class="list-group">
                        @foreach ($cours->cheminements as $cheminement)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h5 class="mb-0">ID :</h5>
                                        <p>{{$cheminement->id}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mb-0">Nom :</h5>
                                        <p>{{$cheminement->nom}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h5 class="mb-0">Numéro de session :</h5>
                                        <p>{{$cheminement->no_session}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprimerModal">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé le cours {{$cours->nom}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('cours.destroy', $cours) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
