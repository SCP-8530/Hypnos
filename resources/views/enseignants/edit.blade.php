<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Modifier l'enseignant : {{$enseignant->prenom}} {{$enseignant->nom}}</h1>
    <form method="post" action="{{route('enseignants.update', $enseignant->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-enseignant text-Bouton="Modifier" :enseignant="$enseignant"></x-formulaire-enseignant>
    </form>
</x-guest-layout>
