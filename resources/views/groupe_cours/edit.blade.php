<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Modifier le groupe cours</h1>
    <form method="post" action="{{route('groupe_cours.update', $groupe_cour->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-groupe-cours text-bouton="Modifier" :groupe_cours="$groupe_cour"></x-formulaire-groupe-cours>
    </form>
</x-guest-layout>
