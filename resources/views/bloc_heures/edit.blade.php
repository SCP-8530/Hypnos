<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Modifier le bloc d'heures : {{$bloc_heures->id}}</h1>
    <form method="post" action="{{route('bloc_heures.update', $bloc_heures->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-bloc-heures text-Bouton="Modifier" :bloc_heures="$bloc_heures"> </x-formulaire-bloc-heures>
    </form>
</x-guest-layout>
