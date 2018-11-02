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
                <div class="card shadow mt--100 no-border pb-2">
                    <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2016/10/docker.png?resize=2200%2C1125" alt="Card image cap">
                    <div class="bg-secondary px-5 py-2">
                        <b>Published on:</b> <span class="description">OCTOBER 18, 2018</span>
                        <button type="button" class="btn btn-outline-info btn-sm ml-2 pull-right">IIUM</button>
                        <button type="button" class="btn btn-outline-danger btn-sm ml-2 pull-right">Education</button>
                    </div>
                    <div class="card-body px-5">
                        <h1 class="display-1">{{ $article->title }}</h1>
                        <article class="pt-2 is-{{ config('blogged.ui.code') }}">
                            {!! $article->parsedBody !!}
                        </article>
                    </div>
                </div>
            </div>
        </section>

        @include('blogged::partials.share')
    </div>
@endsection