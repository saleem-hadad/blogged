<!doctype html>
<html>
    <head>
        {{-- Meta --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>@yield('title', 'Blog') | {{ config('app.name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('head')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        {{-- CSS --}}
        @if(config('blogged.ui.blogged_css', true))
        <link rel="stylesheet" href="{{ blogged_assets('css/app.css') }}">
        @endif

        {{-- Icon --}}
        <link rel="apple-touch-icon" href="{{ asset(config('blogged.ui.fav')) }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset(config('blogged.ui.fav')) }}"/>

        {{-- Dynamic color --}}
        @include('blogged::partials.style')

        {{-- Custom CSS --}}
        @if(!empty(config('blogged.ui.additional_css')))
            @foreach(config('blogged.ui.additional_css') as $css)
                <link rel="stylesheet" type="text/css" href="{{ asset($css) }}">
            @endforeach
        @endif
    </head>
    <body>
        {{-- Google Analytics --}}
        @if(config('blogged.settings.ga_id'))
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', "{{ config('blogged.settings.ga_id') }}", 'auto');
                ga('send', 'pageview');
            </script>
        @endif
        {{-- /Google Analytics --}}

        <div id="app">
            @yield('content')

            <back-to-top></back-to-top>
        </div>

        <script>
            window.base = "{{ blogged_dashboard_path() }}";
        </script>

        {{-- JS --}}
        <script src="{{ blogged_assets('js/app.js') }}"></script>

        {{-- Custom JS --}}
        @if(!empty(config('blogged.ui.additional_js')))
            @foreach(config('blogged.ui.additional_js') as $js)
                <script type="text/javascript" src="{{ asset($js) }}"></script>
            @endforeach
        @endif
    </body>
</html>
