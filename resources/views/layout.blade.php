<!doctype html>
<html>
    <head>
        {{-- Meta --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{ isset($title) ? $title . ' - ' : 'Blog - ' }}{{ config('app.name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        {{-- CSS --}}
        <link rel="stylesheet" href="{{ blogged_assets('css/app.css') }}">

        {{-- Icon --}}
        <link rel="apple-touch-icon" href="{{ asset(config('blogged.ui.fav')) }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset(config('blogged.ui.fav')) }}"/>

        {{-- JS --}}
        <script src="{{ blogged_assets('js/app.js') }}" defer></script>

        {{-- Custom CSS --}}
        @if(!empty(config('blogged.ui.additional_css')))
            @foreach(config('blogged.ui.additional_css') as $css)
                <link rel="stylesheet" type="text/css" href="{{ asset($css) }}">
            @endforeach
        @endif
    </head>
    <body>
        <div id="app">
            @yield('content')
            
            @include('blogged::partials.footer')

            @if(config('blogged.ui.back_to_top'))
                <back-to-top></back-to-top>
            @endif
        </div>

        {{-- Custom JS --}}
        @if(!empty(config('blogged.ui.additional_js')))
            @foreach(config('blogged.ui.additional_js') as $js)
                <script type="text/javascript" src="{{ asset($js) }}"></script>
            @endforeach
        @endif
    </body>
</html>