@extends('layouts.main')
@section('master')
@include('includes.navigation-bar')
<div class="container p-3 mt-5">
    @yield('contents')
</div>

@endsection