@extends('layouts.admin')

@section('content')
    <?php $currentRoute = Route::currentRouteName(); ?>
    <div class="container">
        <gente-dashboard :gente="{{isset($gente) ? json_encode($gente) : json_encode([])}}"></gente-dashboard>
    </div>

@endsection
