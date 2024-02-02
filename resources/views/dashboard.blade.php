<x-app-layout>
    <div class="container my-5 position-relative">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
                <div class="card shadow-sm w-100 rounded border-primary">
                    <div class="card-body text-dark h2 text-center">
                        {{ __("Vous êtes connecté !! Bienvenue") }} {{Auth::user()->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
