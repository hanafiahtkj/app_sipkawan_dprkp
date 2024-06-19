<aside class="main-sidebar sidebar-{{ config('boilerplate.theme.sidebar.type') }}-{{ config('boilerplate.theme.sidebar.links.bg') }} elevation-{{ config('boilerplate.theme.sidebar.shadow') }} sidebar-no-expand">
    <a href="{{ route('boilerplate.dashboard') }}" class="brand-link text-center {{ !empty(config('boilerplate.theme.sidebar.brand.bg')) ? 'bg-'.config('boilerplate.theme.sidebar.brand.bg') : ''}}">
        <span class="brand-logo bg-{{ config('boilerplate.theme.sidebar.brand.logo.bg') }} elevation-{{ config('boilerplate.theme.sidebar.brand.logo.shadow') }}">
            <!-- {!! config('boilerplate.theme.sidebar.brand.logo.icon') !!} -->
            <img class="me-3" src="{{ asset('images/logo-r.webp') }}" alt="" height="25">
        </span>
        <span class="brand-text text-truncate pr-2 text-white" title="{!! strip_tags(config('boilerplate.theme.sidebar.brand.logo.text')) !!}">
            <!-- {!! config('boilerplate.theme.sidebar.brand.logo.text') !!} -->
            SIP-KAWAN
        </span>
    </a>
    <div class="sidebar">
        @if(config('boilerplate.theme.sidebar.user.visible'))
            <div class="user-panel align-items-center text-center">
                <div class="image p-0 d-block">
                    <img src="{{ Auth::user()->avatar_url }}" class="avatar-img img-circle elevation-{{ config('boilerplate.theme.sidebar.user.shadow') }}" alt="{{ Auth::user()->name }}">
                </div>
                <div class="info mt-2">
                    <a href="{{ route('boilerplate.user.profile') }}" class="d-flex flex-wrap">
                        <span class="mr-1">{{ Auth::user()->full_name }}</span>
                        <!-- <span class="text-truncate text-uppercase font-weight-bolder">{{ Auth::user()->last_name }}</span> -->
                    </a>
                </div>
            </div>
        @endif
        <nav class="mt-2">
            {!! $menu !!}
        </nav>
    </div>
</aside>
