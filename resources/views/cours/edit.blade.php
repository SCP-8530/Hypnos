<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Modifier le cours {{$cours->nom}}</h1>
    <form method="post" action="{{route('cours.update', $cours->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-cours text-bouton="Modifier" :cours="$cours"></x-formulaire-cours>
    </form>
</x-guest-layout>
