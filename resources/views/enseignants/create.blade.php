<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="h2 text-center custom-vhTitre">Nouveau enseignant !</h1>
    <form method="post" action="{{route('enseignants.store')}}">
        @csrf
       <x-formulaire-enseignant text-bouton="Ajouter"></x-formulaire-enseignant>
    </form>
</x-guest-layout>
