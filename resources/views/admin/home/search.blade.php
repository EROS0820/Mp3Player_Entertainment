@extends('layouts.admin')

@section('content')
        <?php $currentRoute = Route::currentRouteName(); ?>
        <search-dashboard :result="{{isset($result) ? json_encode($result) : json_encode([])}}"></search-dashboard>
@endsection
