<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        
        <a class="navbar-brand" href="{{ url('/') }}" >
            @include('blogged::partials.logo')
    
            @if (config('blogged.ui.show_app_name'))
                <span>{{ config('app.name') }}</span>
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="/">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                @if(config('blogged.settings.nav_links') !== null)
                    @foreach(config('blogged.settings.nav_links') as $link)
                        @if($link['url'] !== '')
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ $link['url'] }}">
                                    @if($link['icon'] !== '')
                                        <i class="{{ $link['icon_pack'] }} {{ $link['icon_pack'] }}-{{ $link['icon'] }}"></i>
                                    @endif
                                    <span class="nav-link-inner--text">{{ $link['name'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>