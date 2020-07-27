@extends('layouts.admin')

@section('content')
    <?php $currentRoute = Route::currentRouteName(); ?>
    <relac-dashboard :relac="{{isset($relac) ? json_encode($relac) : json_encode([])}}"></relac-dashborad>

@endsection
