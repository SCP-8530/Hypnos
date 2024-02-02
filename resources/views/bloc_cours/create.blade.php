<!-- @author Philippe Bertrand
update @author Guillaume Paoli-->
@vite(["resources/js/bloc_cours.js"])
<x-guest-layout>

    <h1 class="h2">Nouveau bloc de cours !</h1>
    <div class="alert alert-info" role="info"></div>
    <form class="mt-4 w-50" method="post" action="{{route('bloc_cours.store')}}">
        @csrf
        <x-formulaire-bloc-cours> </x-formulaire-bloc-cours>
    </form>
</x-guest-layout>
