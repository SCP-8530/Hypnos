<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="h2 text-center custom-vhTitre">Ajouter une contrainte :</h1>
    <form method="post" action="{{route('contraintes.store')}}">
        @csrf
        <x-formulaire-contrainte text-bouton="Ajouter"></x-formulaire-contrainte>
    </form>
</x-guest-layout>
