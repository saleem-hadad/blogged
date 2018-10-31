<!doctype html>
<html>
    <head>
        {{-- Meta --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{ isset($title) ? $title . ' - ' : null }}{{ config('app.name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSS --}}
        <link rel="stylesheet" href="{{ blogged_assets('css/app.css') }}">

        {{-- JS --}}
        <script src="{{ blogged_assets('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
    </body>
</html>