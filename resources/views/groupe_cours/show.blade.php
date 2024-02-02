<x-guest-layout>
    <div class="container" id="groupe_cours_view">
        <div class="d-flex align-items-center p-2">
            <h1 class="h2 flex-grow-1">Fiche du groupe cours</h1>
            <!-- Button trigger modal -->
            @if (Gate::any(['admin','gestionnaire']))
            <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#ModifModal">
                <span class="btn-text">Modifier</span>
                <span class="btn-icon d-none"><i class="fa fa-edit"></i></span>
            </button>
            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#SuppModal">
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

        <div class="row">
                <div class="card p-2 m-2">
                    <h3 class="h3 card-title">Information général du groupe cours</h3>
                    <p id="gc_id"><b>Id : </b><i>{{$groupe_cour->id}}</i></p>
                    <p><b>Numéro de groupe : </b>{{$groupe_cour->no_groupe}}</p>
                    <p><b>Nombre d'étudiants : </b>{{$groupe_cour->nb_etudiants}}</p>
                    <p><b>Campus : </b>{{$groupe_cour->proprioCampus->nom}}</p>
                    <p><b>Session : </b>{{$groupe_cour->proprioSession->session}} {{$groupe_cour->proprioSession->annee}}</p>
                </div>
                <div class="card p-2 m-2 ">
                    <h3 class="h3 card-title">Cours associé au groupe-cours</h3>
                    <p><b>Id : </b>{{$groupe_cour->proprioCours->id}}</p>
                    <p><b>Nom : </b>{{$groupe_cour->proprioCours->nom}}</p>
                    <p><b>Code : </b>{{$groupe_cour->proprioCours->code}}</p>
                    <p><b>Pondération : </b>{{$groupe_cour->proprioCours->ponderation}}</p>
                    <p class="LesBlocsCoursToGen"><b>Bloc : </b><i>{{$groupe_cour->proprioCours->bloc}}</i></p>
                </div>
                @if($groupe_cour->proprioEnseignant != null)
                    @foreach($groupe_cour->proprioEnseignant as $enseignant)
                        <div class="card p-2 m-2 ">
                            <h3 class="h3 card-title">Enseignant associé au groupe-cours</h3>
                            <p><b>Id : </b>{{$enseignant->id}}</p>
                            <p><b>Nom Prenom : </b>{{$enseignant->nom}} {{$enseignant->prenom}}</p>
                            <p><b>Poste : </b>{{$enseignant->poste}}</p>
                            <p><b>Bureau : </b>{{$enseignant->bureau}}</p>
                            @if (Gate::any(['admin','gestionnaire']))
                            <a href="{{route('horaire.show', $enseignant->horaire_id)}}" class="btn btn-outline-primary mt-auto">
                                Horaire du prof</a>
                            @endif
                        </div>
                    @endforeach
                @endif
        </div>

        <div class="d-flex align-items-center">
            <h2 class="flex-grow-1">Les blocs cours du groupe</h2>
            @if (Gate::any(['admin','gestionnaire']))
            <a href="{{route("bloc_cours.create")}}" class="btn btn-primary" id="btn_bloc_cours">Generer un cours</a>
            @endif
        </div>
        <div class="row">
            @if($groupe_cour->proprioBlocCours != null)
                <p hidden="" id="CountCours">{{$groupe_cour->proprioBlocCours->count()}}</p>
                @foreach($groupe_cour->proprioBlocCours as $bloc_cours)
                    <div class="card p-2 m-2 card_cours" heures="{{$bloc_cours->heures}}">
                        <p class="heures m-2"><b>Heures : </b><i>{{$bloc_cours->heures}}</i></p>
                        <p class="jour m-2"><b>Jour : </b><i>{{$bloc_cours->jour}}</i></p>
                    </div>
                @endforeach
            @endif
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="SuppModal" tabindex="-1" aria-labelledby="SuppModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SuppModalLabel">Confirmation de suppression :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimé le groupe cours ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{route("groupe_cours.destroy", $groupe_cour->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModifModal" tabindex="-1" aria-labelledby="ModifModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModifModalLabel">Confirmation la modification :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Attention, modifier le groupe cours supprimera les cours generer dans le groupe cours.
                    Etes vous sur de cela?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="{{route("groupe_cours.edit", $groupe_cour)}}" class="btn btn-outline-primary m-1">Modifier</a>
                </div>
            </div>
        </div>
    </div>
    @vite(["resources/js/groupe_cours.js"])
</x-guest-layout>

