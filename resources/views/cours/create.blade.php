<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Ajouter un cours </h1>
    <form method="post" action="{{route('cours.store')}}">
        @csrf
        <x-formulaire-cours text-bouton="Ajouter"></x-formulaire-cours>
    </form>
</x-guest-layout>
