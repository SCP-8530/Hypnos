<x-guest-layout>
    <h1 class="text-center custom-vhTitre">Modifier l'horaire : {{$horaire->id}}</h1>
    <form method="post" action="{{route('horaire.update', $horaire->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-horaire text-Bouton="Modifier" :horaire="$horaire"></x-formulaire-horaire>
    </form>
</x-guest-layout>
