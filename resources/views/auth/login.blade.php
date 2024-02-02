<x-guest-layout>
    <div class="position-relative c1">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <h1 class="d-flex justify-content-center h1 font-italic mt-5">Connectez-vous !</h1>
        <div class="d-flex justify-content-center align-items-center">
            <form method="POST" action="{{ route('login') }}" class="w-50">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Adresse courriel')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" class="form-control"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Souvenir de moi') }}</label>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none me-3" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <x-primary-button>
                        {{ __('Se connecter') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
