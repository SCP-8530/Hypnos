<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="h1 text-center custom-vhTitre">Modifier la contrainte :  {{$contrainte->nom}}</h1>
    <form method="post" action="{{route('contraintes.update', $contrainte->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-contrainte text-bouton="Modifier" :contrainte="$contrainte"></x-formulaire-contrainte>
    </form>
</x-guest-layout>
