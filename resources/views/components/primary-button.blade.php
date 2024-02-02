<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark rounded-pill mt-3']) }}>
    {{ $slot }}
</button>
