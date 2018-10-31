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
                    <div class="card shadow mt--100 no-border pb-2">
                        <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2016/10/docker.png?resize=2200%2C1125" alt="Card image cap">
                        <div class="bg-secondary px-5 py-2">
                            <b>Published on:</b> <span class="description">OCTOBER 18, 2018</span>
                            <button type="button" class="btn btn-outline-info btn-sm ml-2 pull-right">IIUM</button>
                            <button type="button" class="btn btn-outline-danger btn-sm ml-2 pull-right">Education</button>
                        </div>
                        <div class="card-body px-5">
                            <h1 class="display-1">How to use Argument Parser in Python</h1>
                            <article class="pt-2">
                                You most probably came across this issue when you deal with images using OpenCV or any other library, where you want to test your code on different images or input! 😕
                                <hr>
                                Usually template matching is done straight forward, but sometimes it needs to undergo several operations first such as conerting to grayscale, blurring and thresholding in some cases. Those operations are kind of crucial when programmers are looking for minimizing the processing time, because not all the time we need color and tiny details to be able to  match our template.
                            </article>
                        </div>
                    </div>
            </div>
        </section>
    </div>
@endsection