<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="@lang('boilerplate::layout.direction')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Informasi Perumahan dan Kawasan Permukiman</title>
    <link rel="shortcut icon" href="{{ asset('vendor/collab/assets/img/favicons/favicon.ico') }}">
@stack('plugin-css')
    <link rel="stylesheet" href="{{ mix('/plugins/fontawesome/fontawesome.min.css', '/assets/vendor/boilerplate') }}">
    <link rel="stylesheet" href="{{ mix('/adminlte.min.css', '/assets/vendor/boilerplate') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@stack('css')
    <script src="{{ mix('/bootstrap.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/admin-lte.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/boilerplate.min.js', '/assets/vendor/boilerplate') }}"></script>
@component('boilerplate::minify')
    <script>
        $.ajaxSetup({headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}});
        bootbox.setLocale('{{ App::getLocale() }}');
        var bpRoutes={
            settings:"{{ route('boilerplate.user.settings',null,false) }}"
        };
        var session={
            keepalive:"{{ route('boilerplate.keepalive', null, false) }}",
            expire:{{ time() +  config('session.lifetime') * 60 }},
            lifetime:{{ config('session.lifetime') * 60 }},
            id:"{{ session()->getId() }}"
        };
    </script>
@endcomponent
@stack('plugin-js')
</head>
<body class="layout-fixed layout-navbar-fixed sidebar-mini{{ setting('darkmode', false) && config('boilerplate.theme.darkmode') ? ' dark-mode accent-light' : '' }}{{ setting('sidebar-collapsed', false) ? ' sidebar-collapse' : '' }}">
    <div class="wrapper">
        @include('boilerplate::layout.header')
        @include('boilerplate::layout.mainsidebar')
        <div class="content-wrapper">
            @include('boilerplate::layout.contentheader')
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        @includeWhen(config('boilerplate.theme.footer.visible', true), 'boilerplate::layout.footer')
        <aside class="control-sidebar control-sidebar-{{ config('boilerplate.theme.sidebar.type') }} elevation-{{ config('boilerplate.theme.sidebar.shadow') }}">
            <button class="btn btn-sm" data-widget="control-sidebar"><span class="fa fa-times"></span></button>
            <div class="control-sidebar-content">
                <div class="p-3">
                    @yield('right-sidebar')
                </div>
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
@stack('js')
@if(session('growl'))
    <script>growl("{!! session('growl')[0] ?? session('growl') !!}", "{{ session('growl')[1] ?? 'info' }}")</script>
@endif
    <script type="text/javascript">
        $(function() {
            // Show the time
            showTime();
            // $(".nav-sidebar").removeClass("nav-child-indent").addClass("nav-flat").addClass("nav-collapse-hide-child");
            $(".nav-sidebar").removeClass("nav-child-indent").addClass("nav-collapse-hide-child");
        })

        function showTime() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            var session = hours >= 12 ? 'pm' : 'am';

            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var time = hours + ":" + minutes + ":" + seconds + " " + session;
            document.getElementById("liveClock").innerText = time;
            document.getElementById("liveClock").textContent = time;

            setTimeout(showTime, 1000);
        }
    </script>
</body>
</html>
