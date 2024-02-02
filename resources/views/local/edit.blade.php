
<x-guest-layout>
    @if (session('message'))
        <p class="alert alert-success">
            {{ session('message') }}
        </p>
    @endif
    <h1 class="text-center custom-vhTitre">Modifier le local : {{$local->no_local}}</h1>
    <form method="post" action="{{route('local.update', $local->id)}}">
        @csrf
        @method('PUT')
        <x-formulaire-local text-Bouton="Modifier" :local="$local"></x-formulaire-local>
    </form>
</x-guest-layout>
