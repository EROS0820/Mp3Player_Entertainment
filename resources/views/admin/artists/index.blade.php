@extends('layouts.admin')

@section('content')
    <?php $currentRoute = Route::currentRouteName(); ?>
    <div class="container">
        <artists-dashboard :artist="{{isset($artist) ? json_encode($artist) : json_encode([])}}"></artists-dashboard>
    </div>

@endsection
