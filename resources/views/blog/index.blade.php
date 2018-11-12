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
                <div class="row">
                    <div class="{{ config('blogged.ui.sidebar') ? 'col-md-8' : 'col-md-12' }}">
                        @forelse ($articles->chunk(config('blogged.ui.columns')) as $chunk)
                            <div class="row is-flex">
                                @foreach($chunk as $article)
                                    <div class="col-md-{{ 12 / config('blogged.ui.columns') }} pb-5">
                                        @include('blogged::partials.card', [
                                            'image'    => $article->image,
                                            'title'    => $article->title,
                                            'category' => $article->category,
                                            'date'     => $article->publish_date->toFormattedDateString(),
                                            'body'     => $article->excerpt,
                                            'url'      => url($article->path()),
                                        ])
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="card shadow no-border">
                                <img class="card-img-top" width="100%" src="https://s3-ap-southeast-1.amazonaws.com/myseniorio/zino.png" alt="Card image cap">
                            </div>
                        @endforelse
                    </div>
    
                    @if(config('blogged.ui.sidebar'))
                        <div class="col-md-4">
                            @include('blogged::partials.sidebar')
                        </div>
                    @endif
                </div>
            </div>
            <div class="justify-content-center pt-5">
                {{ $articles->links() }}
            </div>
        </section>
    </div>

    @include('blogged::partials.footer')
@endsection