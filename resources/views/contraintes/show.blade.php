<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 border rounded p-4">
                <div class="d-flex align-items-center">
                    <h1 class="flex-grow-1">Information complète sur la contrainte :</h1>
                    @if (Gate::any(['admin','gestionnaire']))
                        <a href="{{route("contraintes.edit", $contrainte->id)}}" class="btn btn-warning m-1">
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

                <div class="mb-4">
                    @if (Gate::any(['admin']))
                        <p class="mb-1"><strong>ID :</strong> {{ $contrainte->id }}</p>
                    @endif
                    <p class="mb-1"><strong>Nom :</strong> {{ $contrainte->nom }}</p>
                        <p class="card-text"><strong>Contrainte stricte:</strong> {{ $contrainte->stricte ? 'Oui' : 'Non' }}</p>
                </div>

                <div>
                    <h3>Blocs d'heures associés :</h3>
                    @if ($contrainte->bloc_heures->count() > 0)
                        <div>
                            <ul>
                                @foreach($contrainte->bloc_heures as $bloc_heure)
                                    @php
                                        $jourSemaine = '';
                                        switch($bloc_heure->jour) {
                                            case 1:
                                                $jourSemaine = 'Lundi';
                                                break;
                                            case 2:
                                                $jourSemaine = 'Mardi';
                                                break;
                                            case 3:
                                                $jourSemaine = 'Mercredi';
                                                break;
                                            case 4:
                                                $jourSemaine = 'Jeudi';
                                                break;
                                            case 5:
                                                $jourSemaine = 'Vendredi';
                                                break;
                                        }
                                    @endphp
                                    <li>
                                        {{ $jourSemaine }} :
                                        @php
                                            $plagesHoraires = $bloc_heure->heures;
                                            $result = '';

                                            // Rechercher les plages horaires consécutives avec des 1
                                            $plageDebut = null;
                                            $plageFin = null;

                                            for ($i = 0; $i < strlen($plagesHoraires); $i++) {
                                                if ($plagesHoraires[$i] === '1') {
                                                    if ($plageDebut === null) {
                                                        $plageDebut = $i;
                                                    }
                                                    $plageFin = $i;
                                                } else {
                                                    if ($plageDebut !== null && $plageFin !== null) {
                                                        $heureDebut = 8 + floor($plageDebut / 2);
                                                        $heureFin = 8 + floor($plageFin / 2);

                                                        $heureDebutTexte = str_pad($heureDebut, 2, "0", STR_PAD_LEFT) . ':00';
                                                        $heureFinTexte = str_pad($heureFin, 2, "0", STR_PAD_LEFT) . ':30';

                                                        $result .= $heureDebutTexte . '-' . $heureFinTexte . ', ';

                                                        $plageDebut = null;
                                                        $plageFin = null;
                                                    }
                                                }
                                            }

                                            // Vérifier si la dernière plage horaire est sélectionnée
                                            if ($plageDebut !== null && $plageFin !== null) {
                                                $heureDebut = 8 + floor($plageDebut / 2);
                                                $heureFin = 8 + floor($plageFin / 2);

                                                $heureDebutTexte = str_pad($heureDebut, 2, "0", STR_PAD_LEFT) . ':00';
                                                $heureFinTexte = str_pad($heureFin, 2, "0", STR_PAD_LEFT) . ':30';

                                                // Vérifier si le dernier caractère de la chaîne est '1'
                                                // Si oui, la plage horaire se termine à 18:00
                                                if ($plagesHoraires[strlen($plagesHoraires) - 1] === '1') {
                                                    $heureFinTexte = '18:00';
                                                }

                                                $result .= $heureDebutTexte . '-' . $heureFinTexte;
                                            }

                                            // Supprimer la virgule finale
                                            $result = rtrim($result, ', ');

                                            echo $result;
                                        @endphp
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p>Aucun bloc d'heures associé à cette contrainte.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('bloc_heures.create', ['contrainte_id' => $contrainte->id]) }}" class="btn btn-primary">Ajouter un bloc d'heures</a>
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
                    <p>Voulez-vous vraiment supprimer la contrainte : <strong>{{$contrainte->nom}}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form method="POST" action="{{ route('contraintes.destroy', $contrainte) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer définitivement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
