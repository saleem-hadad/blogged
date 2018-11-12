<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <p class="navbar-brand">
            Dashboard
        </p>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        Actions
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link exact tag="a" to="/" class="nav-link">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </router-link>
                </li>
                
                <li class="nav-item">
                    <router-link exact tag="a" to="/articles" class="nav-link">
                        <i class="ni ni-bullet-list-67 text-primary"></i> My Articles
                    </router-link>
                </li>
                
                <li class="nav-item">
                    <router-link tag="a" to="/articles/new" class="nav-link">
                        <i class="ni ni-planet text-primary"></i> New Article
                    </router-link>
                </li>
            </ul>
            
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Quick Actions</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                @include('blogged::partials.dashboard-links')
            </ul>
        </div>
    </div>
</nav>