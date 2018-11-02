@extends('blogged::layout')

@section('content')
    <div class="main-content">
        <!-- Navbar -->
        @include('blogged::partials.navbar')
        <!-- Header -->
        <div class="header bg-primary py-8"></div>
        <!-- Page content -->
        <section class="section">
            <div class="container">
                <div class="row mt--100">
                    @forelse ($articles as $article)
                        <div class="col-md-6">
                            <div class="card shadow no-border pb-2">
                                <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2016/10/docker.png?resize=2200%2C1125" alt="Card image cap">
                                <div class="card-body">
                                    <h2>{{ $article->title }}</h2>
                                    <p>{{ $article->excerpt }}</p>
                                    <a href="{{ url($article->path()) }}" class="btn btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="card shadow no-border">
                                <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2016/10/docker.png?resize=2200%2C1125" alt="Card image cap">
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="justify-content-center pt-5">
                {{ $articles->links() }}
            </div>
        </section>
    </div>
@endsection