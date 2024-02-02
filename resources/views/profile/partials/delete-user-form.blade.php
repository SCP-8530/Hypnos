<section class="space-y-6">
    @if (Gate::any(['admin','gestionnaire']))
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Delete Account') }}
            </h2>
<p class="mt-1 text-sm text-gray-600">
    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
</p>
</header>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
    {{ __('Delete Account') }}
</button>


<div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
            @csrf
            @method('delete')

            <div class="modal-header">
                <h2 class="modal-title" id="confirm-user-deletion-label">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <div class="modal-body">
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="form-control mt-1"
                        placeholder="{{ __('Password') }}"
                    />

                    @if($errors->userDeletion->has('password'))
                        <div class="invalid-feedback d-block">
                            @foreach($errors->userDeletion->get('password') as $message)
                                {{ $message }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="btn btn-danger ml-3">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endif
</section>
