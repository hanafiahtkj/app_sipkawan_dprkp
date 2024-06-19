<div class="login-box">
    <div class="login-logo mb-4">
        <div>
            <img class="me-3 d-inline-block" src="{{ asset('images/logo-r.webp') }}" alt="" height="100" />
        </div>
    </div>

    <div class="card" style="border-radius:10px;">
        <div class="card-body login-card-body" style="border-radius:10px;">
            {{ $slot }}
        </div>
    </div>
</div>
