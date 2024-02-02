<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Ajouter un cheminement </h1>
    <form method="post" action="{{route('cheminements.store')}}">
        @csrf
        <x-formulaire-cheminement text-bouton="Ajouter"></x-formulaire-cheminement>
    </form>
</x-guest-layout>
