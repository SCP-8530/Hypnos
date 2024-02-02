<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Création d'un nouvel horaire</h1>
    <form method="post" action="{{route('horaire.store')}}">
        @csrf
        <x-formulaire-horaire text-bouton="Ajouter"></x-formulaire-horaire>
    </form>
</x-guest-layout>
