@extends('blogged::layout')

@section('content')
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="/">
                    <img src="/images/text-logo-dark.svg" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="../index.html">
                                    <img src="../assets/img/brand/blue.png">
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
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="../index.html">
                                <i class="ni ni-planet"></i>
                                <span class="nav-link-inner--text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="../examples/register.html">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">Blog</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="../examples/profile.html">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-inner--text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>
        <!-- Page content -->
        <section class="section">
            <div class="container">
                    <div class="card shadow mt--100 no-border">
                        <img class="card-img-top" src="https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2018/09/larecipe-documentation.jpg?resize=2200%2C1125" alt="Card image cap">
                        <div class="card-body px-5">
                            <h1 class="display-1">Beautiful Articles with Markdown in Your Laravel Applications.</h1>
                            <p class="card-text">
                                Blogged is a progressive package used to write blog articles inside normal Laravel application.
                            </p>
                        </div>
                    </div>
            </div>
        </section>
    </div>
@endsection