<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Modifier le cheminement :  {{$cheminement->nom}}</h1>
    <form method="post" action="{{route('cheminements.update', $cheminement->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-cheminement text-bouton="Modifier" :cheminement="$cheminement"></x-formulaire-cheminement>
    </form>
</x-guest-layout>
