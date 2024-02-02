<x-guest-layout>
    <div class="navbar">
        <h1 class="h2 flex-grow-1">Les groupes cours</h1>
        <a href="{{route('sessions.create')}}" class="btn btn-secondary me-2">Ajouter une session</a>
        <a href="{{route('groupe_cours.create')}}" class="btn btn-primary">Ajouter un groupe cours</a>
    </div>
    @if (session('message'))
        <p class="alert alert-success w-50 mt-4">
            {{ session('message') }}
        </p>
    @endif
    <div class="accordion" id="accordion_GC">
        @foreach($sessions as $session)
        <div class="accordion-item">
            <h2 class="h3 accordion-header" id="H-{{$session->session}}{{$session->annee}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#C-{{$session->session}}{{$session->annee}}" aria-expanded="true" aria-controls="C-{{$session->session}}{{$session->annee}}">
                    {{$session->session}} {{$session->annee}}
                </button>
            </h2>
            <div id="C-{{$session->session}}{{$session->annee}}" class="accordion-collapse collapse" aria-labelledby="H-{{$session->session}}{{$session->annee}}" data-bs-parent="#accordion_GC">
                <div class="accordion-body">
                    <div class="row mb-5">
                        @foreach($objets as $gc)
                            @if($gc->session_id == $session->id)
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Groupe cours {{$gc->id}}</h3>
                                        <p class="card-text">
                                            Numero de groupe: {{$gc->no_groupe}}<br>
                                            Nombre d'étudiants: {{$gc->nb_etudiants}}<br>
                                            Campus : {{$gc->proprioCampus->nom}}
                                            Cours : {{$gc->proprioCours->nom}}
                                        </p>
                                        <a href="{{route("groupe_cours.show", $gc->id)}}" class="btn btn-outline-primary">
                                            Voir les blocs cours</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-guest-layout>
