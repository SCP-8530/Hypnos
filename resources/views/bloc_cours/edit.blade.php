<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="h2">Modifier le bloc de cours : {{$bloc_cours->id}}</h1>
    <form method="post" action="{{route('bloc_cours.update', $bloc_cours->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-bloc-cours text-Bouton="Modifier" :bloc_cours="$bloc_cours"> </x-formulaire-bloc-cours>
    </form>
</x-guest-layout>
