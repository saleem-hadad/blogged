@extends('blogged::layout')

@section('content')
@include('blogged::dashboard.sidebar')

<div class="main-content">
    @include('blogged::partials.navbar')
    
    <router-view></router-view>
</div>

@endsection