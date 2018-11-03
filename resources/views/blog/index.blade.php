@extends('blogged::layout')

@section('content')
    <div class="main-content">
        <!-- Navbar -->
        @include('blogged::partials.navbar')

        <!-- Header -->
        <div class="header bg-primary py-8"></div>
        
        <!-- Page content -->
        <section class="section">
            <div class="container" style="margin-top: -100px">
                @forelse ($articles->chunk(config('blogged.settings.columns')) as $chunk)
                    <div class="row is-flex">
                        @foreach($chunk as $article)
                            <div class="col-md-{{ 12 / config('blogged.settings.columns') }} pb-5">
                                @include('blogged::partials.card', [
                                    'image' => $article->image,
                                    'title' => $article->title,
                                    'body' => $article->excerpt,
                                    'url' => url($article->path()),
                                ])
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="card shadow no-border">
                            <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2016/10/docker.png?resize=2200%2C1125" alt="Card image cap">
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="justify-content-center pt-5">
                {{ $articles->links() }}
            </div>
        </section>
    </div>

    @include('blogged::partials.footer')
@endsection