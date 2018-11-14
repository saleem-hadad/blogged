@extends('blogged::layout')

@section('title')
    {{ $article->title }}
@endsection

@section('head')
    @include('blogged::partials.seo', [
        'title'       => $article->title,
        'description' => $article->excerpt,
        'url'         => $article->path(),
        'image'       => $article->image,
    ])
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
                        <a href="{{ $article->category->path() }}" class="btn btn-link btn-sm" style="margin-right: 0px">{{ $article->category->title }}</a>/ <span class="description">{{ $article->publish_date->toFormattedDateString() }}</span> (<span class="readingTime"></span>)
                    </div>

                    <div class="card-body px-5">
                        <h1 class="display-1">{{ $article->title }}</h1>
                        <article class="pt-2 is-{{ config('blogged.ui.code') }}">
                            {!! $article->parsedBody !!}
                        </article>
                    </div>

                    <div class="card-footer px-5">
                            @include('blogged::partials.author', [
                                'avatar' => $article->authorAvatar(),
                                'name'   => $article->author->name
                            ])
                    </div>
                </div>
            </div>
        </section>

        @include('blogged::partials.share', ['url' => $article->path(), 'description' => $article->excerpt ])
        @include('blogged::plugins.forum', ['url' => $article->path(), 'slug' => $article->slug])
    </div>

    @include('blogged::partials.footer')
@endsection