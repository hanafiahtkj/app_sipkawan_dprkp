<div class="login-box">
    <div class="login-logo">
        <div>
            {!! config('boilerplate.theme.sidebar.brand.logo.icon') ?? '' !!}
        </div>
        <div>
            {!! config('boilerplate.theme.sidebar.brand.logo.text') ?? $title ?? '' !!}
        </div>
    </div>

    <div class="card" style="border-radius:10px;">
        <div class="card-body login-card-body" style="border-radius:10px;">
            {{ $slot }}
        </div>
    </div>
</div>
