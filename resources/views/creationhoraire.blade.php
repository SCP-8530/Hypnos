<x-guest-layout>
    <!--https://www.w3schools.com/html/html5_draganddrop.asp-->
    <div class="container">
        <br>
        <div class="row">
            <!--Horaire afficher-->
            <div class="col-9">
                <?php $horaire = \App\Models\Horaires::factory()->createOne()?>
                <x-table-horaire :Horaire="$horaire"></x-table-horaire>
            </div>

            <!--Cours a placer-->
            <div class="col">

            </div>
        </div>
    </div>
</x-guest-layout>

