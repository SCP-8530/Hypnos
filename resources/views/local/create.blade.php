<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Ajout d'un nouveau local :</h1>
    <form method="post" action="{{route('local.store')}}">
        @csrf
        <x-formulaire-local text-bouton="Ajouter"></x-formulaire-local>
    </form>
</x-guest-layout>

