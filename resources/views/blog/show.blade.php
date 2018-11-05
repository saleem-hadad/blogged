@extends('blogged::layout')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="main-content">
        <!-- Navbar -->
        @include('blogged::partials.navbar')

        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- Page content -->
        <section class="section">
            <div class="container" style="margin-top: -100px; margin-bottom: 100px">
                <div class="card shadow no-border pb-2">
                    <img class="card-img-top" src="{{ $article->image }}" alt="Card image cap">

                    <div class="bg-secondary px-5 py-2">
                        <div class="row">
                            <div class="col-md-6">
                                Category: <button type="button" class="btn btn-outline-danger btn-sm ml-1">Education</button> (<span class="readingTime"></span>)
                            </div>
                            <div class="col-md-6 text-right">
                                <b>Published on:</b> <span class="description">{{ $article->publish_date->toFormattedDateString() }}</span>
                            </div>
                        </div>
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

        @include('blogged::partials.share', ['url' => $article->path()])
        @include('blogged::plugins.forum', ['url' => $article->path(), 'slug' => $article->slug])
    </div>

    @include('blogged::partials.footer')
@endsection