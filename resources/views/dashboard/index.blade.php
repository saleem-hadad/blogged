@extends('blogged::layout')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('blogged::dashboard.sidebar')

    <div class="main-content">
        @include('blogged::partials.navbar')
        
        <router-view></router-view>

        <p style="font-size: 0.8rem; text-align: center;" class="my-5"><a href="https://blogged.binarytorch.com.my" target="__blank">Blogged</a> · Developed with love by Binary Torch · {{ blogged_version() }}</p>
    </div>
@endsection