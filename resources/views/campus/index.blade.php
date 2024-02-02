<x-guest-layout>
    <div class="text-center">
        <div class="container">
            <div class="navbar">
                <h1 class="m-3 h1">Liste des campus</h1>
                @if (Gate::any(['admin','gestionnaire']))
                <a href="{{ route('campus.create') }}" class="btn btn-outline-primary">Ajouter</a>
                @endif
            </div>
            <ul class="list-group c4">
                {{-- Le nom objets vient du contrôleur --}}
                @foreach($objets as $campus)
                    <li class="list-group-item">{{ $campus->nom }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-guest-layout>
