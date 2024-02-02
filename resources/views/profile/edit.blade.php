<!-- @author Philippe Bertrand -->
<x-app-layout>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="">
                    <div class="card-header bg-white">
                        <h2 class="fw-bold mb-0">{{ __('Profile') }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                        <hr class="my-4">
                        <div class="mb-4">
                            @include('profile.partials.update-password-form')
                        </div>
                        <hr class="my-4">
                        <div class="mb-4">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
