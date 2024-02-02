<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Nouveau groupe cours</h1>
    <form method="post" action="{{route('groupe_cours.store')}}">
        @csrf
        <x-formulaire-groupe-cours text-bouton="Ajouter"></x-formulaire-groupe-cours>
    </form>
</x-guest-layout>
