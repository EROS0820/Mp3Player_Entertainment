@extends('layouts.admin')

@section('content')
        <?php $currentRoute = Route::currentRouteName(); ?>
        <home-dashboard :items="{{isset($items) ? json_encode($items) : json_encode([])}}"></home-dashboard>
@endsection
