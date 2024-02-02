<!-- @author Philippe Bertrand -->
<x-guest-layout>
    <h1 class="custom-vhTitre text-center">Nouveau bloc d'heures </h1>
    <form method="post" action="{{route('bloc_heures.store')}}">
        @csrf
        <x-formulaire-bloc-heures > </x-formulaire-bloc-heures>
    </form>
</x-guest-layout>
