@extends('layouts.admin')

@section('content')
    <?php $currentRoute = Route::currentRouteName(); ?>
    <div class="container">
        <tubidy-dashboard :tubidy="{{isset($tubidy) ? json_encode($tubidy) : json_encode([])}}"></tubidy-dashboard>
    </div>

@endsection
